<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthorRegisterForm extends Component
{
    public $name, $register_id, $register_password;

    public function RegisterHandler()
    {
        // Determine whether it's an email or username
        $fieldType = filter_var($this->register_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if ($fieldType == 'email') {
            $this->validate([
                'name' => 'required|string|min:3|max:255',
                'register_id' => 'required|email|unique:users,email',
                'register_password' => 'required|min:5',
            ]);
        } else {
            $this->validate([
                'name' => 'required|string|min:3|max:255',
                'register_id' => 'required|string|min:3|max:20|unique:users,username',
                'register_password' => 'required|min:5',
            ]);
        }

        // Create the user
        $user = new User();
        $user->name = $this->name;
        $user->{$fieldType} = $this->register_id;
        $user->password = Hash::make($this->register_password);
        $user->save();

        session()->flash('success', 'Registration successful! You can now log in.');

        return redirect()->route('author.login');
    }

    public function render()
    {
        return view('livewire.author-register-form');
    }
}
