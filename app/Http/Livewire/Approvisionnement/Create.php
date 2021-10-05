<?php

namespace App\Http\Livewire\Approvisionnement;

use App\Entrers;
use App\Articles;
use App\Ligne_entrer;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class Create extends Component
{
    public $articles;
    public $qte;
    public $date_reception;
    public $article;
    public $article_categorie;
    public $article_prix;
    public $ligne = [];
    public $item;
    public $code;
    public $ligneExiste = false;

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
     * Ajoute Une nouvelle ligne A partir du formulaire
     * @return void
     */
    public function addLigne()
    {
        $this->validate([
            'article' => 'required|string',
            'qte' => 'required|numeric|min:1',
        ]);
        if (empty($this->ligne)) {
            $this->add();

             #code pour retirer l'article sélectionné de la liste des articles
             foreach ($this->articles as $key => $value) {
                if ($value === $this->article) {
                    $this->trashed[$key] = $value;
                    unset($this->articles[$key]);
                    $key = +1;
                }
            }

        } else {
            for ($i = 0; $i + 1 <= count($this->ligne); $i++) {
                if ($this->ligne[$i]['article'] == Articles::where('libelle','=',$this->article)->first()->libelle) {
                    $this->dispatchBrowserEvent('sweetAlert', [
                        'title' => 'Cet article a déjà été selectionné',
                        'timer' => 5000,
                        'icon' => 'error',
                    ]);
                    break;
                } else {
                    $this->add();

                    #code pour retirer l'article sélectionné de la liste des articles
                    foreach ($this->articles as $key => $value) {
                        if ($value === $this->article) {
                            $this->trashed[$key] = $value;
                            unset($this->articles[$key]);
                            $key = +1;
                        }
                    }

                    break;
                }
            }
        }
    }

    public function add()
    {
        $article = Articles::where('libelle','=',$this->article)->first();
        $this->article_prix = $article->prix_tarification;
        $this->article = $article->libelle;
        $this->article_categorie = $article->categorie->libelle;

        // unshift pour une nouvelle ligne ne haut
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
                $article->update(
                    [
                        'qte_stocker' => $article->qte_stocker + $value['qte'],
                        'qte_en_stock' => $article->qte_en_stock + $value['qte'],
                    ]
                );
            }
            $this->resetLigne();
            Alert::success('Approvisoinnement Effectué', '');
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
        'article' => 'required|string',
    ];
    protected $messages = [
        'article.*' => 'Selectionnez un article.',
    ];
    protected $validationAttributes = [
        'qte' => 'quantité'
    ];

    public function mount()
    {
        $this->code = date('ym') . Entrers::count();

        $articles = Articles::orderBy('libelle','ASC')->get();

        foreach ($articles as $key => $value) {
            $this->articles[$key] = $value->libelle;
        }
    }



    public function render()
    {
        return view('livewire.approvisionnement.create');
    }
}
