<?php

namespace App\Http\Livewire\Approvisionnement;

use App\Articles;
use App\Fournisseurs;
use Livewire\Component;

class Create extends Component
{
    public $fournisseurs;
    public $articles;
    public $qte_recu;
    public $date_reception;
    public $article;
    public $ligne = [];
    public $item;

    public function submit()
    {
        $this->validate();
    }

    /**
     * Remonte les information de la liste vers le formulaire pour le update
     */
    public function updateLigne($item)
    {
        $data = $this->ligne[$item];
        // dd($data);
        $this->qte_recu = $data['qte_recu'];
        $this->addDeleteLigne($item);
    }


    /**
     * Ajoute Une nouvelle ligne A partir du formulaire
     * @return void
     */
    public function addLigne()
    {
        // verifie la validation
        $this->validate();

        // unshift pour une entréé en commençant par le bas
        array_unshift(
            $this->ligne,
            [
                'code' => '0001',
                'article' => $this->article,
                'qte_recu' => $this->qte_recu,
                'categorie' => 'Silver',
                'prix' => '450',
            ]
        );
    }


    /**
     * Suppprime une ligne (par les boutons supprimer de chaque ligne)
     */
    public function addDeleteLigne($item)
    {
        unset($this->ligne[$item]);
    }



    protected $rules = [
        'qte_recu' => 'required|numeric|min:1',
        'date_reception' => 'nullable|date',
    ];

    protected $validationAttributes = [
        'qte_recu' => 'quantité'
    ];

    public function render()
    {
        $this->articles = Articles::all();
        $this->fournisseurs = Fournisseurs::all();
        return view('livewire.approvisionnement.create');
    }
}
