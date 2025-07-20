<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\File;
use App\Models\Setting;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;


class AuthorController extends Controller
{
    public function index(Request $request)
    {
        return view('back.pages.home');
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('author.login');
    }

    public function ResetForm(Request $request, $token = null)
    {
        $data = [
            'pageTittle' => 'Reset Password',
        ];
        return view('back.pages.auth.reset', $data)->with(['token' => $token, 'email' => $request->email]);
    }

    public function changeProfilePicture(Request $request)
    {
        $user = User::find(auth('web')->id());
        $path = 'back/assets/images/authors/';
        $file = $request->file('file');
        $old_picture = $user->getAttributes()['picture'];
        $file_path = $path . $old_picture;
        $new_picture_name = 'AIMG' . $user->id . time() . rand(1, 100000) . '.jpg';

        if ($old_picture != null && File::exists(public_path($file_path))) {
            File::delete(public_path($file_path));
        }
        $upload = $file->move(public_path($path), $new_picture_name);
        if ($upload) {
            $user->update(['picture' => $new_picture_name]);
            return response()->json(['status' => 1, 'msg' => 'Your profile picture has been updated successfully']);
        } else {
            return response()->json(['status' => 0, 'msg' => 'Something went wrong']);

        }
    }

    public function createPost(Request $request)
    {
        $request->validate([
            'post_title' => 'required|unique:posts,post_title',
            'post_content' => 'required',
            'post_category' => 'required|exists:sub_categories,id',
            'featured_image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);


        if ($request->hasFile('featured_image')) {
            $path = "images/post_images/";
            $file = $request->file('featured_image');
            $filename = $file->getClientOriginalName();
            $new_filename = time() . '_' . $filename;

            $upload = Storage::disk('public')->put($path . $new_filename, (string)file_get_contents($file));

            $post_thumbnails_path = $path . 'thumbnails';
            if (!Storage::disk('public')->exists($post_thumbnails_path)) {
                Storage::disk('public')->makeDirectory($post_thumbnails_path, 0755, true, true);
            }

            // Create square thumbnail
            Image::make(storage_path('app/public/' . $path . $new_filename))
                ->fit(200, 200)
                ->save(storage_path('app/public/' . $path . 'thumbnails/' . 'thumb_' . $new_filename));

            // Create resized image
            Image::make(storage_path('app/public/' . $path . $new_filename))
                ->fit(500, 350)
                ->save(storage_path('app/public/' . $path . 'thumbnails/' . 'resized_' . $new_filename));


            if ($upload) {
                $post = new Post();
                $post->author_id = auth()->id();
                $post->category_id = $request->post_category;
                $post->post_title = $request->post_title;
//                $post->post_slug = Str::slug($request->post_title);
                $post->post_content = $request->post_content;
                $post->featured_image = $new_filename;
                $saved = $post->save();

                if ($saved) {
                    return response()->json(['code' => 1, 'msg' => 'Post has been created successfully']);
                } else {
                    return response()->json(['code' => 3, 'msg' => 'Something went wrong for saving post']);
                }
            } else {
                return response()->json(['code' => 3, 'msg' => 'Something went wrong for uploading featured image']);
            }
        }
    }

    public function editPost(Request $request){
        if(!request()->post_id){
            return abort(404);
        }else{
            $post = Post::find(request()->post_id);
            $data = [
                'post' => $post,
                'pageTittle' => 'Edit Post',
            ];
            return view('back.pages.edit_post', $data);
        }
    }

    public function updatePost(Request $request)
    {
        $post = Post::find($request->post_id);

        // Validate common fields
        $request->validate([
            'post_title' => 'required|unique:posts,post_title,' . $post->id,
            'post_content' => 'required',
            'post_category' => 'required|exists:sub_categories,id',
        ]);

        // Handle image upload (optional)
        if ($request->hasFile('featured_image')) {
            $request->validate([
                'featured_image' => 'mimes:jpeg,png,jpg,gif,svg|max:1024',
            ]);

            $path = "images/post_images/";
            $file = $request->file('featured_image');
            $filename = $file->getClientOriginalName();
            $new_filename = time() . '_' . $filename;

            $upload = Storage::disk('public')->put($path . $new_filename, (string)file_get_contents($file));

            if ($upload) {
                // Create thumbnails
                $thumbnailPath = $path . 'thumbnails/';
                if (!Storage::disk('public')->exists($thumbnailPath)) {
                    Storage::disk('public')->makeDirectory($thumbnailPath, 0755, true, true);
                }

                Image::make(storage_path('app/public/' . $path . $new_filename))
                    ->fit(200, 200)
                    ->save(storage_path('app/public/' . $thumbnailPath . 'thumb_' . $new_filename));

                Image::make(storage_path('app/public/' . $path . $new_filename))
                    ->fit(500, 350)
                    ->save(storage_path('app/public/' . $thumbnailPath . 'resized_' . $new_filename));

                // Delete old image
                $oldImage = $post->featured_image;
                if ($oldImage && Storage::disk('public')->exists($path . $oldImage)) {
                    Storage::disk('public')->delete($path . $oldImage);
                    Storage::disk('public')->delete($thumbnailPath . 'resized_' . $oldImage);
                    Storage::disk('public')->delete($thumbnailPath . 'thumb_' . $oldImage);
                }

                $post->featured_image = $new_filename;
            }
        }

        // Update post fields
        $post->category_id = $request->post_category;
        $post->post_title = $request->post_title;
        $post->post_slug = null;
        $post->post_content = $request->post_content;

        $saved = $post->save();

                $post = Post::find($request->post_id);
                $post->category_id = $request->post_category;
                $post->post_slug = null;
                $post->post_content = $request->post_content;
                $post->post_title = $request->post_title;
                $saved = $post->save();

                if ($saved) {
                    $this->dispatchBrowserEvent('toast', [
                        'message' => 'Post updated successfully!',
                        'type' => 'success' // or 'error'
                    ]);
                } else {
                    return response()->json(['code' => 3, 'msg' => 'Something went wrong for updating post']);
                }
            }
        }
    }

}
