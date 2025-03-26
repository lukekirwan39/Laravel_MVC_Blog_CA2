<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class AllPosts extends Component
{
    public function render()
    {
        return view('livewire.all-posts',[
            'posts'=>auth()->user()->type == 1 ? Post::all() : Post::where('author_id',auth()->id())->get()
        ]);
    }
}
