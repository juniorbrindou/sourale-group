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
    #corbeille de liste d'article
    public $trashed = [];

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
        $article = Articles::where('libelle','=',$this->article)->first();
        $this->article_prix = $article->prix_tarification;
        $this->article = $article->libelle;
        $this->article_categorie = $article->categorie->libelle;

        if ($article->qte_en_stock >= $this->qte) {
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

  
              #code pour retirer l'article sélectionné de la liste des articles
              foreach ($this->articles as $key => $value) {
                  if ($value === $this->article) {
                      $this->trashed[$key] = $value;
                      unset($this->articles[$key]);
                      $key = +1;
                  }
              }
        } else {
            $this->dispatchBrowserEvent(
                'sweetAlert',
                [
                    'icon' => 'error',
                    'title' => 'Quantité choisie n\'est pas disponible. Pensez à vous approvisionner d\'abord'
                ]
            );
        }
    }




    /**
     * Suppprime une ligne (par les boutons supprimer de chaque ligne)
     */
    public function addDeleteLigne($item)
    {
        foreach ($this->trashed as $value) {
            if ($value === $this->ligne[$item]['article']) {
                \array_unshift($this->articles, $this->ligne[$item]['article']);
            }
        }
        unset($this->ligne[$item]);
        $this->ligne = array_values($this->ligne);
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
        'article' => 'required|string',
        'motif' => 'required',
    ];
    protected $messages = [
        'article.*' => 'Selectionnez l\'article.',
    ];
    protected $validationAttributes = [
        'qte' => 'quantité'
    ];

    public function mount()
    {
        $this->code = date('ym') . Destockage::count();

        $articles = Articles::orderBy('libelle','ASC')->get();

        foreach ($articles as $key => $value) {
            $this->articles[$key] = $value->libelle;
        }
    }


    public function render()
    {
        return view('livewire.destockage.create');
    }
}
