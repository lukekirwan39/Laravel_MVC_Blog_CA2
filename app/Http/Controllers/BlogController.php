<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Comment;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $categories = Category::all();

        return view('blog.index', compact('posts', 'categories'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('blog.show', compact('post'));
    }

    public function categoryPosts(Request $request, $slug) {

        if (!$slug){
            return abort(404);
        }else{
            $subcategory = SubCategory::where('slug', $slug)->first();
            if (!$subcategory){
                return abort(404);
            }else{
                $posts = Post::where('category_id', $subcategory->id)
                ->orderBy('created_at','desc')
                ->paginate(6);

                $data = [
                    'pageTitle'=>'Category - '.$subcategory->subcategory_name,
                    'category'=>$subcategory,
                    'posts'=>$posts,
                ];
            }
        }

        return view('front.pages.category_posts', $data);
    }

    public function searchBlog(Request $request)
    {
        // Accept both ?query= and ?s=
        $query = trim($request->get('query') ?? $request->get('s') ?? '');

        if (strlen($query) >= 2) {
            $searchValues = preg_split('/\s+/', $query, -1, PREG_SPLIT_NO_EMPTY);

            $posts = Post::with(['subcategory', 'author'])
                ->where(function ($q) use ($searchValues) {
                    foreach ($searchValues as $value) {
                        $q->orWhere('post_title', 'LIKE', "%{$value}%")
                            ->orWhere('post_tags', 'LIKE', "%{$value}%");
                    }
                })
                ->orderBy('created_at', 'desc')
                ->paginate(6)
                ->appends(['query' => $query]);

            return view('front.pages.search_posts', [
                'pageTitle' => 'Search for :: ' . $query,
                'posts'     => $posts,
            ]);
        }

        // optional: instead of 404, just show empty results page
        return redirect()->back()->with('error', 'Please enter at least 2 characters to search.');
    }

    public function readPost($slug) {
        if (!$slug){
            return abort(404);
        }else{
            $post = Post::where('post_slug', $slug)
                ->with('subcategory')
                ->with('author')
                ->first();

            $post_tags = explode(',',$post->post_tags);
            $related_posts = Post::where('id','!=',$post->id)
                ->where(function($query) use ($post_tags, $post){
                    foreach ($post_tags as $item){
                        $query->orWhere('post_tags','like',"%$item%")
                            ->orWhere('post_title','like',$post->post_title);
                    }
                })
                ->inRandomOrder()
                ->take(3)
                ->get();

            $data = [
                'pageTitle'=>Str::ucfirst($post->post_title),
                'post'=>$post,
                'related_posts'=>$related_posts
            ];

            return view('front.pages.single_post',$data);
        }

    }

}
