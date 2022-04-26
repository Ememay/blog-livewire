<?php

namespace App\Http\Livewire\Includes;

use App\Models\article;
use App\Models\categorie;
use Livewire\Component;

class Search extends Component
{

    public $categories;
    public $catId;
    public $char = '';


    public function mount($catId, $char = '')
    {
        $this->categories = categorie::all();
        $this->catId = $catId;
        $this->char = $char;
    }


    public function render()
    {

        if ($this->catId == 0) {
            $results = article::where(
                'top_title',
                'like',
                '%' . $this->char . '%'
            )->orwhere(
                'text',
                'like',
                '%' . $this->char . '%'
            )->paginate(4);
        } else {
            $results = article::where('category_id', $this->catId)->paginate(4);
        }



        return view('livewire.includes.search', ['results' => $results]);
    }
}
