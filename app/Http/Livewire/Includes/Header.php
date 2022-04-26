<?php

namespace App\Http\Livewire\Includes;

use Livewire\Component;

class Header extends Component
{
    public $searchChar;


    public function render()
    {
        return view('livewire.includes.header');
    }
}
