<?php

namespace App\Http\Livewire\Tarification;

use App\Categories;
use App\Tarification;
use App\Type_articles;
use Livewire\Component;

class Index extends Component
{
    public $tarifs;
    public $prix;
    public $typeArticles;
    public $categorieArticles;

    protected $rules = [
        'prix' => 'required',
    ];

    public function delete()
    {
    }

    public function render()
    {
        $this->tarifs = Tarification::all();
        $this->typeArticles = Type_articles::all();
        $this->categorieArticles = Categories::all();

        return view('livewire.tarification.index');
    }
}
