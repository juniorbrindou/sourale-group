<?php

namespace App\Http\Livewire\Location;

use App\Articles;
use App\Clients;
use Livewire\Component;
use App\Type_evenements;

class Create extends Component
{
    public $currentStep = 1;
    public $clients;
    /*Evennement*/
    public $libelle_event;
    public $nbr_personne;
    public $type_evenements;
    public $type_evenement_id;
    public $lieuEvenement;
    public $date_debut_evenement;
    public $date_fin_evenement;

    /* Ancien clien*/
    public $oldClient;
    /* nouveau client*/
    public $newAdresse;
    public $newNom;
    public $newContact1;
    /*--------------*/
    /* les articles*/
    public $articles;
    public $article;
    public $article_prix;
    public $qte_article;
    public $article_categorie;
    public $nbJour;
    public $article_code;
    /* Location */
    public $code = 150;
    public $ligne = [];
    public $tabArticles = [];


    public function addArticle()
    {
        // Sectionner un article une seule fois
        if (!empty($this->tabArticles)) {
            for ($i = 0; $i < count($this->tabArticles); $i++) {
                if ($this->article == $this->tabArticles[$i]['article']) {
                    $this->dispatchBrowserEvent('sweetAlert', [
                        'title' => 'Erreur de saisie',
                        'timer' => 5000,
                        'icon' => 'error',
                        'text' => 'Cet article a deja été selectionné',
                    ]);
                    break;
                } else {
                    $this->add();
                    break;
                }
            }
        } else {
            $this->add();
        }
    }



    /**
     * @return [type]
     */
    public function add()
    {
        // verifie la validation
        $this->validate([
            'article' => 'required',
            'qte_article' => 'required',
            'nbJour' => 'required',
        ]);


        // renvoie dans this->article le libelle
        $article = Articles::where('libelle', '=', $this->article)->first();
        $this->article_prix = $article->prix_tarification;
        $this->article = $article->libelle;
        $this->article_categorie = $article->categorie->libelle;

        // unshift pour une entréé en commençant par le haut
        array_unshift(
            $this->tabArticles,
            [
                'code' => $article->code,
                'article' => $this->article,
                'categorie' => $this->article_categorie,
                'qte_article' => $this->qte_article,
                'nbJour' => $this->nbJour,
                'prix' => $this->article_prix,
                'totalUneLigne' => $this->nbJour * $this->article_prix,
            ]
        );
    }


    /**
     * Remonte les information de la liste vers le formulaire pour le update
     */
    public function updateLigne($item)
    {
        $data = $this->tabArticles[$item];
        $this->article = $data['article'];
        $this->qte_article = $data['qte_article'];
        $this->nbJour = $data['nbJour'];
        $this->addDeleteLigne($item);
    }


    /**
     * Rénitialise le tableau
     * @return void
     */
    public function resetLigne()
    {
        $this->tabArticles = [];
    }


    /**
     * Suppprime une ligne (par les boutons supprimer de chaque ligne)
     */
    public function addDeleteLigne($item)
    {
        unset($this->tabArticles[$item]);
    }



    /**
     * Write code on Method
     *
     * @return response()
     */
    public function firstStepSubmit()
    {
        if ($this->newNom && $this->oldClient) {
            $this->currentStep = 1;
            $this->dispatchBrowserEvent('sweetAlert', [
                'title' => 'Erreur de saisie',
                'timer' => 3000,
                'icon' => 'error',
                'text' => 'Vous ne pouvez pas créer un nouveau client et Choisir un client exiatnt simultanément!',
            ]);
        } elseif ($this->newNom != null && $this->oldClient == null) {
            $this->ligne =
                [
                    'nom' => $this->newNom,
                    'contact1' => $this->newContact1,
                    'adresse' => $this->newAdresse,
                    'isNew' => true,
                ];
            $this->currentStep = 2;
        } elseif ($this->newNom == null && $this->oldClient != null) {
            $oldClient = Clients::whereId($this->oldClient)->first();
            $this->ligne =
                [
                    'nom' => $oldClient->nom,
                    'contact1' => $oldClient->contact1,
                    'adresse' => $oldClient->adresse,
                    'isNew' => false,
                ];
            $this->currentStep = 2;
        } else {
            $this->dispatchBrowserEvent('sweetAlert', [
                'title' => 'Erreur de saisie',
                'timer' => 3000,
                'icon' => 'error',
                'text' => 'Réferencez le client avant de continuer!',
            ]);
            $this->currentStep = 1;
        }
    }



    /**
     * @return [type]
     */
    public function gotToBeforeStepSubmit()
    {
    }





    /**
     * Write code on Method
     * @return response()
     */
    public function secondStepSubmit()
    {
        $this->validate([
            'libelle_event' => 'required',
            'nbr_personne' => 'required',
            'date_debut_evenement' => 'required',
            'type_evenement_id' => 'required',
            'date_fin_evenement' => 'required|after:date_debut_evenement',
        ]);
        $this->ligne['libelle_event'] = $this->libelle_event;
        $this->ligne['lieuEvenement'] = $this->lieuEvenement;
        $this->ligne['type_evenement_id'] = $this->type_evenement_id;
        $this->ligne['nbr_personne'] = $this->nbr_personne;
        $this->ligne['date_debut_evenement'] = $this->date_debut_evenement;
        $this->ligne['date_fin_evenement'] = $this->date_fin_evenement;

        $this->currentStep = 3;
    }

    protected $rules = [
        'oldClient' => 'required',
        'type_evenements' => 'required',
    ];
    // protected $messages = [
    //     'article.numeric' => 'Selectionnez l\'article.',
    // ];
    // protected $validationAttributes = [
    //     'qte' => 'quantité'
    // ];

    public function render()
    {
        $this->type_evenements = Type_evenements::all();
        $this->clients = Clients::all();
        $this->articles = Articles::all();
        return view('livewire.location.create');
    }
}
