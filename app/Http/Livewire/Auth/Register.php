<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{

    public $email;
    public $password;
    public $password_confirmation;
    public $policy;

    

    public function login(){

        $this->validate([
            'email' => 'required |  email | unique:users,email',
            'password' => 'required |  string | min:6 | confirmed',
            'policy' => 'accepted'
        ]);


        $newUser = new User();
        $newUser->is_admin = 0;
        $newUser->role = 'user';
        $newUser->email = $this->email;
        $newUser->password = Hash::make($this->password);
        $newUser->gender = 1;
        $newUser->news = 1;
        $newUser->save();

        $id = $newUser->id;
        Auth::loginUsingId($id);
        return redirect()->to('/');
        
    }


    public function render()
    {
        return view('livewire.auth.register');
    }
}
