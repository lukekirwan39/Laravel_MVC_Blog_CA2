<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class AllPosts extends Component
{
    use WithPagination;

    protected $listeners = ['deletePostAction'];

    public function deletePost($id)
    {
        $this->dispatchBrowserEvent('deletePost',[
            'title'=>'Are you sure?',
            'html'=>'You are about to delete this post',
            'id'=>$id
        ]);
    }

    public function deletePostAction($id){
        $post = Post::find($id);
        $path = 'images/post_images/';
        $featured_image = $post->featured_image;

        if($featured_image != null && Storage::disk('public')->exists($path.$featured_image)){
            if(Storage::disk('public')->exists($path.'thumbnails/resized_'.$featured_image)){
                Storage::disk('public')->delete($path.'thumbnails/resized_'.$featured_image);
            }

            if(Storage::disk('public')->exists($path.'thumbnails/thumb_'.$featured_image)){
                Storage::disk('public')->delete($path.'thumbnails/thumb_'.$featured_image);
            }

            Storage::disk('public')->delete($path.$featured_image);

        }
        $delete_post = $post->delete();

        if($delete_post){
            session()->flash('success', 'Post has been deleted successfully');
        } else{
            session()->flash('error', 'Something went wrong');
        }
    }


    public function render()
    {
        return view('livewire.all-posts', [
            'posts' => auth()->user()->type == 1
                ? Post::latest()->paginate(6)
                : Post::where('author_id', auth()->id())->latest()->paginate(6)
        ]);
    }
}
