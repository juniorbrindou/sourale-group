<?php

namespace App\Http\Livewire\Destockage;

use App\Articles;
use App\Destockage;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    public $articles;
    public $qte;
    public $motif;
    public $date_reception;
    public $article;
    public $article_categorie;
    public $article_prix;
    public $article_qte_en_stock;
    public $ligne = [];
    public $item;
    public $code;

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
     * Ajoute Une nouvelle ligne dans le tableau du formulaire
     * @return void
     */
    public function addLigne()
    {
        // verified la validation
        $this->validate();
        // renvoie dans this→article le model article
        $article = Articles::whereId($this->article)->first();
        $this->article_prix = $article->prix_tarification;
        $this->article = $article->libelle;
        $this->article_categorie = $article->categorie->libelle;

        if ($article->qte_en_stock > $this->qte) {
            // unshift pour une entrée en commençant par le bas
            array_unshift(
                $this->ligne,
                [
                    'code' => $this->code,
                    'article' => $this->article,
                    'qte' => $this->qte,
                    'categorie' => $this->article_categorie,
                    'prix' => $this->article_prix,
                    'motif' => $this->motif,
                ]
            );
        }else{
            $this->dispatchBrowserEvent('sweetAlert',
                [
                    'icon' => 'error',
                    'title' => 'Quantité suppérieure à celle disponible'
                ]
            );
        }
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

            foreach ($this->ligne as $value) {
                $article = Articles::whereLibelle($value['article'])->first();
                $article_id = $article->id;

                $this->article = $article->libelle;
                Destockage::create(
                    [
                        'qte' => $value['qte'],
                        'article_id' => $article_id,
                        'motif' => $value['motif'],
                        'user_id' => Auth::user()->id,
                    ]
                );
                $article->update(
                    [
                        'qte_stocker' => $article->qte_stocker - $value['qte'],
                        'qte_en_stock' => $article->qte_stocker - $value['qte'],
                    ]
                );
            }
            $this->resetLigne();
            return redirect()->route('destockages.index');
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
        'motif' => 'required',
    ];
    protected $messages = [
        'article.numeric' => 'Selectionnez l\'article.',
    ];
    protected $validationAttributes = [
        'qte' => 'quantité'
    ];





    public function render()
    {
        $this->code = date('ym') . Destockage::count();

        $this->articles = Articles::all();
        return view('livewire.destockage.create');
    }
}
