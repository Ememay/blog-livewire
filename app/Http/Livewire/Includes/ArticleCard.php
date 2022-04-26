<?php

namespace App\Http\Livewire\Includes;

use Livewire\Component;

class ArticleCard extends Component
{


    public $articles;

    public function mount($articles){
        $this->articles = $articles;
    }

    public function render()
    {
        return view('livewire.includes.article-card');
    }
}
