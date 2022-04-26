<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{


    public $email;
    public $password;
    public $remember;


    public function login()
    {

        $this->validate([
            'email' => 'required | email',
            'password' => 'required | string'
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            $this->emit('Alert', 'شما به حساب کاربری خود وارد شدید', 'success');
            return redirect()->to('/');
        }
    }



    public function render()
    {
        return view('livewire.auth.login');
    }
}
