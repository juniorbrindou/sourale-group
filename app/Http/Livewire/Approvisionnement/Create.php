<?php

namespace App\Http\Livewire\Approvisionnement;

use App\Entrers;
use App\Articles;
use Carbon\Carbon;
use App\Fournisseurs;
use App\Ligne_entrer;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    public $fournisseurs;
    public $articles;
    public $qte;
    public $date_reception;
    public $article;
    public $article_categorie;
    public $article_prix;
    public $ligne = [];
    public $item;
    public $code;
    private $i;


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
        $this->qte = $data['qte'];
        $this->article = $data['article'];
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

        // renvoie dans this->article le libelle
        $article = Articles::whereId($this->article)->first();
        $this->article_prix = $article->prix_tarification;
        $this->article = $article->libelle;
        $this->article_categorie = $article->categorie->libelle;

        // unshift pour une entréé en commençant par le bas
        array_unshift(
            $this->ligne,
            [
                'code' => $this->code,
                'article' => $this->article,
                'qte' => $this->qte,
                'categorie' => $this->article_categorie,
                'prix' => $this->article_prix,
            ]
        );
        session()->flash('success', 'Post successfully updated.');
    }


    /**
     * Suppprime une ligne (par les boutons supprimer de chaque ligne)
     */
    public function addDeleteLigne($item)
    {
        unset($this->ligne[$item]);
    }

    /**
     * Insertion en bd
     * @return void
     */
    public function addInBD()
    {
        if (!empty($this->ligne)) {
            $entree = Entrers::create(
                [
                    'code' => $this->ligne[0]['code'],
                    'user_id' => Auth::user()->id,
                ]
            );


            foreach ($this->ligne as $value) {
                $article = Articles::whereLibelle($value['article'])->first();
                $article_id = $article->id;

                $this->article = $article->libelle;
                $this->article_categorie = $article->categorie->libelle;

                Ligne_entrer::create(
                    [
                        'article_id' => $article_id,
                        'entrer_id' => $entree->id,
                        'qte' => $value['qte'],
                    ]
                );
            }
            $this->resetLigne();
            return redirect()->route('approvisionnement.index');
        } else {
            return;
        }
    }


    /**
     * Rénitialise le tableau
     * @return void
     */
    public function resetLigne()
    {
        $this->ligne = [];
    }



    protected $rules = [
        'qte' => 'required|numeric|min:1',
        'article' => 'required|numeric',
    ];
    protected $messages = [
        'article.numeric' => 'Selectionnez l\'article.',
    ];
    protected $validationAttributes = [
        'qte' => 'quantité'
    ];

    public function render()
    {
        $this->code = date('ym') . Entrers::count();

        $this->articles = Articles::all();
        return view('livewire.approvisionnement.create');
    }
}
