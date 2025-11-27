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
}
