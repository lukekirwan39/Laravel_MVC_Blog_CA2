<?php
//// app/Http/Controllers/AdminPostController.php
//
//namespace App\Http\Controllers;
//
//use App\Models\Category;
//use App\Models\Post;
//use Illuminate\Http\Request;
//
//class AdminPostController extends Controller
//{
//    public function index(Request $request)
//    {
//        if (is_null($request)) {
//            abort(500, 'Request object is null');
//        }
//
//        $posts = Post::latest()->paginate(10);
//        return view('admin.posts.index', compact('posts'));
//    }
//
//    public function edit($id)
//    {
//        $post = Post::findOrFail($id);
//        $categories = Category::all();
//        return view('admin.posts.edit', compact('post', 'categories'));
//    }
//
//    public function update(Request $request, $id)
//    {
//        $post = Post::findOrFail($id);
//        $post->update($request->all());
//        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully');
//    }
//
//    // Other methods (create, store, destroy) can be added here
//}
