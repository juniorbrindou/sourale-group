<?php

/** @noinspection ALL */

namespace App\Http\Livewire\Location;

use Livewire\Component;
use App\Articles;
use App\Location;
use Carbon\Carbon;
use App\Evenements;

class Retour extends Component
{
    public $qte_retour;
    public $clients;
    /*Evennement*/
    public $tab_location;
    public $evenement;
    public $libelle_event;
    public $nbr_personne;
    public $type_evenements;
    public $type_evenement_id;
    public $lieuEvenement;
    public $date_debut_evenement;
    public $date_fin_evenement;
    public $duree_evenement;

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
    public $nb_jour;
    public $article_code;
    /* Location */
    public $tab_locations;
    public $code = 150;
    public $ligne = [];
    public $tabArticles = [];
    public $totalNet;
    public $caution = 0;
    public $totalBrute = 0;
    public $totalUneLigne;

    public $edit_id;

    public $ttc;


    public function cloturer()
    {
        Evenements::whereId($this->evenement->id)->first()->update(['status' => 'CLOTURÉ']);
        return redirect()->route('locations.index');
    }




    protected $listeners = [
        'updateLineCloturation' => 'afterLineUpdate'
    ];

    public function afterLineUpdate()
    {
        $this->reset('edit_id');
    }


    public function startEdit($id)
    {
        $this->edit_id = $id;
    }

    protected $rules = [
        'qte_retour' => 'required',
    ];

    public function forValidation($qte_retour)
    {
        $this->validateOnly($qte_retour);
    }

    public function save($id)
    {
        $this->validate();
        sleep(1);
    }



    public function mount($evenement)
    {
        $this->tab_locations = Location::where('evenement_id', '=', $evenement->id)->get();

        $this->ligne['nom_client'] = $evenement->client->nom;
        $this->ligne['contact1_client'] = $evenement->client->contact1;
        $this->ligne['contact2_client'] = $evenement->client->contact2;
        $this->ligne['libelle_event'] = $evenement->libelle;
        $this->ligne['lieu_event'] = $evenement->lieu;
        $this->ligne['type_event_id'] = $evenement->type_evenement_id;
        $this->ligne['nbr_personne'] = $evenement->nbr_personne;
        $this->ligne['date_debut_evenement'] = $evenement->date_debut_evenement;
        $this->ligne['date_fin_evenement'] = $evenement->date_fin_evenement;
        $this->ligne['caution'] = $evenement->caution;
        $this->ligne['percentage_caution'] = $evenement->percentage_caution;
        $this->ligne['date_fin_evenement'] = $evenement->date_fin_evenement;
        $this->ttc = $this->ttcCalcul($evenement->montant_total, $evenement->remise, $evenement->caution);

        #Gestion de la durée d'evenement
        $containDuree =  Carbon::parse($this->date_debut_evenement)->DiffForHumans($this->date_fin_evenement, true);
        if (\str_contains($containDuree, 'secon') || \str_contains($containDuree, 'heure') || (\str_contains($containDuree, 'minute'))) {
            $containDuree = '1 Jour';
        }

        $this->ligne['duree_evenement'] = $containDuree;
        $this->ligne['montant_total'] = $evenement->montant_total;

        $this->evenement = $evenement;
        $this->type_evenements = Evenements::all();
    }


        /**
     * Fonctions de calculs
     * @param $ht
     * @param $remise
     * @param $caution
     * @return
     */
    public function ttcCalcul($ht, $remise, $caution)
    {
        return  ($ht - $remise +$caution);
    }

    public function render()
    {
        return view('livewire.location.retour');
    }
}
