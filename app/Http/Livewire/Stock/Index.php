<?php

namespace App\Http\Livewire\Stock;

use App\Articles;
use Livewire\Component;

class Index extends Component
{
    public $articles;
    public function mount()
    {
        $this->articles = Articles::all();
    }



    public function render()
    {
        return view('livewire.stock.index');
    }
}
