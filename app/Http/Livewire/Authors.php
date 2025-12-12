<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Random;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use Livewire\WithPagination;

class Authors extends Component
{
    use WithPagination;

    public $name, $email, $username, $author_type, $direct_publisher;
    public $search;
    public $perPage = 15;
    public $selected_author_id;
    public $blocked = 0;

    protected $listeners = [
        'resetForm',
        'deleteAuthorAction',
    ];

    public function mount(){
        $this->resetPage();
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function resetForm(){
        $this->name = $this->email = $this->username = $this->author_type = $this->direct_publisher = null;
        $this->resetErrorBag();
    }

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

        if ($this->isOnline()) {
            $default_password = Random::generate(8);

            $author = new User();
            $author->name = $this->name;
            $author->email = $this->email;
            $author->username = $this->username;
            $author->password = Hash::make($default_password);
            $author->type = $this->author_type;
            $author->direct_publish = $this->direct_publisher;
            $saved = $author->save();

            $data = array(
                'name' => $this->name,
                'email' => $this->email,
                'username' => $this->username,
                'password' => $default_password,
                'url' => route('author.profile'),
            );

            $author_email = $this->email;
            $author_name = $this->name;

            if ($saved) {
//                Mail::send('new-author-email-template', $data, function ($message) use ($author_email, $author_name) {
//                    $message->from('noreply@example.com', 'Larablog');
//                    $message->to($author_email, $author_name)
//                        ->subject('New Author Account Created');
//                });

                $mail_body = view('new-author-email-template', $data)->render();

                $mailConfig = array(
                    'mail_from_email' => env('EMAIL_FROM_ADDRESS'),
                    'mail_from_name' => env('EMAIL_FROM_NAME'),
                    'mail_recipient_email' => $author_email,
                    'mail_recipient_name' => $author_name,
                    'mail_subject' => 'Account creation',
                    'mail_body' => $mail_body
                );

                sendMail($mailConfig);

                $this->dispatchBrowserEvent('swal:success', [
                    'title' => 'Success',
                    'text' => 'Author account created successfully. An email has been sent with login details.',
                ]);

                $this->dispatchBrowserEvent('hide_add_author_modal');

                $this->reset(['name', 'email', 'username', 'author_type', 'direct_publisher']);
            } else {
                $this->dispatchBrowserEvent('swal:error', [
                    'title' => 'Failed',
                    'text' => 'Failed to create author account. Please try again.',
                ]);
            }

        } else {
            $this->dispatchBrowserEvent('swal:error', [
                'title' => 'Offline',
                'text' => 'You are offline, please check your internet connection',
            ]);
        }

    }

    public function editAuthor($author){
        $this->selected_author_id = $author['id'];
        $this->name = $author['name'];
        $this->email = $author['email'];
        $this->username = $author['username'];
        $this->author_type = $author['type'];
        $this->direct_publisher = $author['direct_publish'];
        $this->blocked = $author['blocked'];

        $this->dispatchBrowserEvent('show-edit-author-modal');
    }

    public function updateAuthor(){

        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->selected_author_id,
            'username' => 'required|min:6|max:20|unique:users,username,' . $this->selected_author_id,
        ]);

        $author = User::findOrFail($this->selected_author_id);

        $author->update([
            'name'            => $this->name,
            'email'           => $this->email,
            'username'        => $this->username,
            'type'            => $this->author_type,
            'blocked'         => $this->blocked,
            'direct_publish'  => $this->direct_publisher,
        ]);

        $this->dispatchBrowserEvent('hide-edit-author-modal');

        $this->resetForm();
    }

    public function deleteAuthor($author){
        $this->dispatchBrowserEvent('deleteAuthor', [
            'title'=>'Are you sure?',
            'html'=>'You want to delete this author: <br><b>'.$author['name'].'</b>',
            'id'=>$author['id'],
        ]);
    }


    public function deleteAuthorAction($id){
        $author = User::find($id);
        $path = 'back/assets/images/authors/';
        $author_picture = $author->getAttributes()['picture'];
        $picture_full_path = $path.$author_picture;

        if ($author_picture != null || File::exists(public_path($picture_full_path))){
            File::delete(public_path($picture_full_path));
        }
        $author->delete();
    }

    public function isOnline($site = "https://youtube.com/"){
        if (@fopen($site, "r")) {
            return true; // Site is online
        } else {
            return false; // Site is offline
        }
    }

    public function render()
    {
        return view('livewire.authors', [
            'authors' => User::search(trim($this->search))
                            ->where('id', '!=', auth()->id())->paginate($this->perPage),
        ]);
    }
}
