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

    public $perPage = 12;
    public $search = null;
    public $author = null;
    public $category = null;
    public $orderBy = 'desc';

//    public function deletePost($id)
//    {
//        $this->dispatchBrowserEvent('deletePost',[
//            'title'=>'Are you sure?',
//            'html'=>'You are about to delete this post',
//            'id'=>$id
//        ]);
//    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingCategory()
    {
        $this->resetPage();
    }

    public function updatingAuthor()
    {
        $this->resetPage();
    }

    public function deletePostAction($id)
    {
        $post = Post::find($id);
        $path = 'images/post_images/';
        $featured_image = $post->featured_image;

        if ($featured_image && Storage::disk('public')->exists($path . $featured_image)) {
            Storage::disk('public')->delete([
                $path . $featured_image,
                $path . 'thumbnails/resized_' . $featured_image,
                $path . 'thumbnails/thumb_' . $featured_image
            ]);
        }

        if ($post->delete()) {
            $this->emit('postDeleted'); // ✅ triggers Swal on frontend
        } else {
            $this->emit('deleteFailed'); // ❌ triggers error Swal
        }
    }


    public function render()
    {
        return view('livewire.all-posts',[
            'posts'=> auth()->user()->type == 1 ?
                Post::search(trim($this->search))
                    ->when($this->category, function($query){
                        $query->where('category_id', $this->category);
                    })
                    ->when($this->author, function($query){
                        $query->where('author_id', $this->author);
                    })
                    ->when($this->orderBy, function($query){
                        $query->orderBy('id', $this->orderBy);
                    })
                    ->paginate($this->perPage) :
                Post::search(trim($this->search))
                    ->when($this->category, function($query){
                        $query->where('category_id', $this->category);
                    })
                    ->where('author_id', auth()->id())
                    ->when($this->orderBy, function($query){
                        $query->orderBy('id', $this->orderBy);
                    })
                    ->paginate($this->perPage)
        ]);
    }
}
