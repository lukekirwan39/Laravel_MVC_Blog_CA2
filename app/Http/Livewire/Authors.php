<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Authors extends Component
{
    public $name, $email, $username, $author_type, $direct_publisher;

    public function addAuthor(){
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username|min:6|max:20',
            'author_type' => 'required',
            'direct_publisher' => 'required',
        ],[
            'author_type.required'=>'Choose author type',
            'direct_publisher.required'=>'Specify author publication access',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'username' => $this->username,
            'author_type' => $this->author_type,
            'direct_publisher' => $this->direct_publisher,
        ]);

        session()->flash('message', 'Author added successfully.');
        $this->reset(['name', 'email', 'username', 'author_type', 'direct_publisher']);
    }

    public function render()
    {
        return view('livewire.authors',[
            'authors'=>User::where('id','!=', auth()->id())->get()
        ]);
    }
}
