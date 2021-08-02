<?php

namespace App\Http\Livewire\CategorieArticle;

use Livewire\Component;
use App\Categories;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $categorieArticles;



    public function render()
    {
        $categorieArticles = Categories::paginate(5);
        
        return view('livewire.categorie-article.index',compact('categorieArticles'));
    }
}
