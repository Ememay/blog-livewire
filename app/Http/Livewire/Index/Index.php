<?php

namespace App\Http\Livewire\Index;

use App\Models\article;
use Livewire\Component;

class Index extends Component
{


    public $bestArticles;
    public $lastArticles;
    
    public function mount(){
  
        $this->bestArticles = article::where('is_best','1')->take(4)->get();
        $this->lastArticles = article::latest()->take(4)->get();
  
    }

    public function render()
    {
        return view('livewire.index.index');
    }
}
