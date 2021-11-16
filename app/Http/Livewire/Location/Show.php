<?php

namespace App\Http\Livewire\Location;

use App\Articles;
use App\Factures;
use App\Location;
use Carbon\Carbon;
use App\Evenements;
use function _\each;
use Livewire\Component;
use App\Type_evenements;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class Show extends Component
{
    #stepper
    public $currentStep = 2;

    #models init
    public $type_evenements;
    public $client;
    public $user;
    public $articles;
    #liste des locations init
    public $tab_locations = [];
    #type d'evenement préselectionné
    public $type_evenement_preselected;

    public $type_evenement_libelle; #del
    public $evenement;
    public $evenement_libelle;
    public $evenement_nbr_personne;
    public $evenement_montant_total;
    public $evenement_lieu;
    public $evenement_caution;
    public $evenement_date_debut_evenement;
    public $evenement_date_fin_evenement;
    public $evenement_percentage_caution;
    public $tab_evenement = [];
    public $duree_evenement;
    public $article_libelle;
    public $qte_article;
    public $nb_jour;

    #corbeille de liste d'article
    public $trashed = [];

    # Nouveau champ remise
    public $remise=0;

    # Booleen pour caution Modifiable
    public $reductible = false;




    /**
     * Rendre la caution modifiable
     * @return [bolean]
     */
    public function activeReductionField()
    {
        if ($this->reductible == true) {

            $this->tab_evenement['evenement_caution'] = ($this->tab_evenement['evenement_montant_total'] - $this->remise) * $this->evenement_percentage_caution / 100;
            $this->tab_evenement['ttc'] = $this->ttcCalcul($this->tab_evenement['evenement_montant_total'],$this->remise,$this->tab_evenement['evenement_caution']);

            return $this->reductible = false;

        }else {

            return $this->reductible = true;
        }
    }





    /**
     * Ajout de nouvelle ligne dans le tableau frontend
     * @return void
     */
    public function add()
    {
        # recuperation du model article
        $article = Articles::where('libelle', '=', $this->article_libelle)->firstOrFail();

        # recupereation du libelle de l'article
        $libelle_categorie_article = $article->categorie->libelle;

        # recuperation du prix de l'article
        $article_prix = $article->prix_tarification;

        # Calcul du total que fait une ligne ( nombre de jour x prix de l'article x quantité)
        $total_une_ligne = $this->nb_jour * $article_prix * $this->qte_article;

        # Ajout des données au debut du tableau tab_locations[0]
        array_unshift(
            $this->tab_locations,
            [
                'article_libelle' => $this->article_libelle,
                "article_categorie" => $libelle_categorie_article,
                'qte_loue' => (int) $this->qte_article,
                'nb_jour' => (int) $this->nb_jour,
                "prix" => $article_prix,
                "total_une_ligne" => $total_une_ligne,
            ]
        );

        # Code pour retirer l'article sélectionné de la liste des articles
        foreach ($this->articles as $key => $value) {
            if ($value === $this->article_libelle) {
                $this->trashed[$key] = $value;
                unset($this->articles[$key]);
                $key = +1;
            }
        }

        # vidage des champs du formulaire
        $this->makeEmptyFields();
    }









    /**
     * Ajout de nouvelle ligne
     * @return void
     */
    public function addArticle()
    {
        # validation lors de l'ajout de ligne
        $this->validate(
            [
                'article_libelle' => 'required|string|min:2',
                'qte_article' => 'required',
                'nb_jour' => 'required',
            ],
            [
                'article_libelle.*' => 'Veuillez selectionner un article.',
                'qte_article.*' => 'Veuillez saisir la quantité.',
                'nb_jour.*' => 'Veuillez saisir le nombre de jour.',
            ]
        );

        # Ajout de nouvelle ligne
        $this->add();

        # Montant total de l'évènement
        $this->tab_evenement['evenement_montant_total'] = array_sum(array_column($this->tab_locations, 'total_une_ligne'));

        # caution de l'évènement
        if ($this->tab_evenement['evenement_montant_total'] >= $this->remise)
            $this->tab_evenement['evenement_caution'] = ($this->tab_evenement['evenement_montant_total'] - $this->remise) * $this->evenement_percentage_caution / 100;
        else
            $this->tab_evenement['evenement_caution'] = 0;

        # TTC
        $this->tab_evenement['ttc'] = $this->tab_evenement['evenement_caution'] + $this->tab_evenement['evenement_montant_total'] - $this->remise;

    }









    /**
     * Action en base de données : Modifiation de l'évènement
     * @return void
     */
    public function addInBD()
    {
        if (!empty($this->tab_locations)) { # si tableau d'articles contient des éléments

            # obtention de l'id du type de l'évènement
            $type_evenement_id = Type_evenements::where('libelle', '=', $this->tab_evenement['type_evenement_libelle'])->first()->id;

            #recuperation de la remise
            if (isset($this->remise)) {
                if ($this->remise > 0 ) {
                    $this->tab_evenement['remise'] = $this->remise;
                }else{
                    $this->tab_evenement['remise'] = 0;
                }
            }else{
                $this->tab_evenement['remise'] = 0;
            }

            # modification des informations de l'évènement
            $this->evenement->update(
                [
                    'libelle' => $this->tab_evenement['evenement_libelle'],
                    'caution' => $this->tab_evenement['evenement_caution'],
                    'percentage_caution'=> $this->evenement_percentage_caution,
                    'type_evenement_id' => $type_evenement_id,
                    'montant_total' => $this->tab_evenement['evenement_montant_total'],
                    'lieu' => $this->tab_evenement['evenement_lieu'],
                    'date_debut_evenement' => $this->tab_evenement['evenement_date_debut_evenement'],
                    'date_fin_evenement' => $this->tab_evenement['evenement_date_fin_evenement'],
                    'nbr_personne' => $this->tab_evenement['evenement_nbr_personne'],
                    'remise' => $this->tab_evenement['remise'],
                    'nb_jour' => Carbon::parse($this->tab_evenement['evenement_date_debut_evenement'])->DiffInDays($this->tab_evenement['evenement_date_fin_evenement']),
                ]
            );

            # modification de la facture de l'évènement
            Factures::where('evenement_id', '=', $this->evenement->id)->update(
                [
                    "caution" => $this->tab_evenement['evenement_caution'],
                    "user_id" => Auth::user()->id,
                    "evenement_id" => $this->evenement->id,
                    "libelle" => 'Facture-' . $this->tab_evenement['evenement_libelle'],
                ]
            );

            #recupération des anciennes lignes Location en bd
            $old_locations = Location::where('evenement_id', '=', $this->evenement->id)->get();

            #suppression des anciennes lignes Location en bd
            foreach ($old_locations as $location) {
                Location::destroy($location->id);
            }

            # creation des locations
            foreach ($this->tab_locations as $new_location) {

                # Récupération de chaque article
                $article = Articles::whereLibelle($new_location['article_libelle'])->first();

                #creation de nouvelles lignes Location en bd
                Location::create(
                    [
                        'qte_loue' => $new_location['qte_loue'],
                        'prix_unitaire' => $new_location['prix'],
                        'user_id' => Auth::user()->id,
                        'evenement_id' => $this->evenement->id,
                        'article_id' => $article->id,
                        'client_id' => $this->evenement->client->id,
                        'nb_jour' => $new_location['nb_jour'],
                        'total_une_ligne' => $new_location['total_une_ligne'],
                    ]
                );
            }

            # Message a afficher en cas de success
            Alert::success('Evenement Modifié', '');
            # redirection
            return redirect()->route('locations.index');
        } else { # si aucun article n'a été selectionné et que bouton enregistré est cliqué
            $this->dispatchBrowserEvent('sweetAlert', [
                'title' => 'Aucun article choisi',
                'timer' => 15000,
                'icon' => 'error',
            ]);
        }
    }









    /**
     * Passage de la saisie des informations de l'évènement à la page de selection des articles
     * @return response()
     */
    public function secondStepSubmit()
    {
        # validation des informations saisies de l'évènement
        $this->validate([
            'evenement_libelle' => 'required|unique:evenements,libelle,'.$this->evenement->id,
            'evenement_nbr_personne' => 'required|numeric',
            'evenement_date_debut_evenement' => 'required',
            'type_evenement_libelle' => 'required',
            'evenement_date_fin_evenement' => 'required',
            'evenement_percentage_caution' => 'required|min:0|max:100|numeric',
        ],[
            'evenement_libelle.unique' => 'Ce nom d\'evenement existe déja',
            'evenement_libelle.*' => 'Saisissez un nom valide',
            'evenement_nbr_personne.*' => 'Ce champs doit comporter un nombre',
            'evenement_date_debut_evenement.required' => 'Veuillez choisir une date',
            'type_evenement_libelle.*' => 'Veuillez remplir ce champs',
            'evenement_date_fin_evenement.*' => 'Veuillez choisir une date',
            'evenement_percentage_caution.*' => 'La date de fin doit être superieure à la date de début',
        ]);

        # creation du tableau contenant les infos sur l'évènement
        $this->tab_evenement['evenement_libelle'] = $this->evenement_libelle;

        # calcul de la caution : premier affichage
        $this->tab_evenement['evenement_caution'] = $this->evenement_montant_total * $this->evenement_percentage_caution / 100;
        $this->tab_evenement['evenement_montant_total'] = $this->evenement_montant_total;
        #calcul  de ttc : ttc  = ht - remise + caution
        $this->tab_evenement['ttc'] = $this->ttcCalcul($this->evenement_montant_total,$this->evenement->remise,$this->tab_evenement['evenement_caution']);
        $this->tab_evenement['evenement_lieu'] = $this->evenement_lieu;
        $this->tab_evenement['evenement_nbr_personne'] = $this->evenement_nbr_personne;
        $this->tab_evenement['evenement_date_debut_evenement'] = $this->evenement_date_debut_evenement;
        $this->tab_evenement['evenement_date_fin_evenement'] = $this->evenement_date_fin_evenement;
        $this->tab_evenement['type_evenement_libelle'] = $this->type_evenement_libelle;
        $containDuree = Carbon::parse($this->evenement_date_debut_evenement)->DiffInDays($this->evenement_date_fin_evenement);

        # Traitement de la durée: si elle contient heure ou minutes alors convertir affecter 1 jour à la place
        if ($containDuree <= 1){
            $containDuree = 1;
        }

        $this->tab_evenement['duree_evenement'] = $containDuree;

        # passage au step 3
        $this->currentStep = 3;
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







    /**
     * fonction d'initialisation
     * @param Evenements $evenement
     * @return void
     */
    public function mount(Evenements $evenement)
    {
        # Liste des clients
        $this->client = $evenement->client;
        # Liste des types evenement
        $this->type_evenements = Type_evenements::orderBy('libelle', 'ASC')->get();
        #le type d'evenement préselectionné:
        $this->type_evenement_libelle = $evenement->type_evenement->libelle;

         # Recuperation de la remise en BD
         $this->remise = $this->evenement->remise;

        # creation du tableau des articles de la liste
        $articles = Articles::orderBy('libelle', 'ASC')->get();
        # convertion de la liste des articles tableau
        foreach ($articles as $key => $value) {
            $this->articles[$key] = $value->libelle;
        }
        \array_values($this->articles);

        #execution de foreach pour creer le tableau global de la liste des locations
        $tab = each((object) Location::where('evenement_id', '=', $evenement->id)->get(), function ($value, $key) {
            echo $value;
        });

        #creation de this->tab_location a partir des données en BD
        foreach ($tab as $key => $value) {
            $this->tab_locations[$key]['article_libelle'] = $value->article->libelle;
            $this->tab_locations[$key]['article_categorie'] = $value->article->categorie->libelle;
            $this->tab_locations[$key]['qte_loue'] = $value->qte_loue;
            $this->tab_locations[$key]['nb_jour'] = $value->nb_jour;
            $this->tab_locations[$key]['prix'] = (int) $value->article->prix_tarification;
            $this->tab_locations[$key]['total_une_ligne'] = (int) $value->total_une_ligne;
        }

        # trashed est une copie de tab location pour une verification : les articles doivent quitter dans
        # trshed pour remonter dans la liste des articles
        $this->trashed=$this->tab_locations;

        $tab_articles_presents = (array_column($this->tab_locations,'article_libelle'));

        $this->articles = array_diff($this->articles, $tab_articles_presents);

        $this->user = $tab[0]->user;

        #pour les champs de stepper evenement :
        $this->evenement_lieu = $evenement->lieu;
        $this->evenement_caution = $evenement->caution;
        $this->evenement_libelle = $evenement->libelle;
        $this->evenement_percentage_caution = $evenement->percentage_caution;
        $this->evenement_nbr_personne = $evenement->nbr_personne;
        $this->evenement_montant_total = $evenement->montant_total;
        $this->evenement_date_debut_evenement = \str_replace(' ', 'T', $evenement->date_debut_evenement);
        $this->evenement_date_fin_evenement = \str_replace(' ', 'T', $evenement->date_fin_evenement);
        $this->duree_evenement = Carbon::parse($this->evenement->date_debut_evenement)->DiffForHumans($this->evenement->date_fin_evenement, true);
    }









    /**
     * Suppprime une ligne (par les boutons supprimer de chaque ligne)
     * @return void
     */
    public function deleteLigne($item)
    {
        foreach ($this->trashed as $value) {
            if ($value['article_libelle'] === $this->tab_locations[$item]['article_libelle']) {
                \array_unshift($this->articles, $this->tab_locations[$item]['article_libelle']);
            }
        }


         # Code pour retirer l'article sélectionné de la liste des articles
         foreach ($this->articles as $key => $value) {
            if ($value === $this->article_libelle) {
                $this->trashed[$key] = $value;
                unset($this->articles[$key]);
                $key = +1;
            }
        }

        $this->tab_evenement['evenement_montant_total'] = $this->tab_evenement['evenement_montant_total'] - $this->tab_locations[$item]['total_une_ligne'];
        # caution de l'évènement
        if ($this->tab_evenement['evenement_montant_total'] >= $this->remise)
        {
            $this->tab_evenement['evenement_caution'] = ($this->tab_evenement['evenement_montant_total'] - $this->remise) * $this->evenement_percentage_caution / 100;
        }else{

            $this->tab_evenement['evenement_caution'] = 0;
//            $this->tab_evenement['ttc'] = 0;

        }


        # TTC

        unset($this->tab_locations[$item]);
        $this->tab_locations = array_values($this->tab_locations);
        $this->makeEmptyFields();
    }










    /**
     * vide les champs de formulaire
     * @return void
     */
    private function makeEmptyFields()
    {
        $this->article_libelle = '';
    }










    /**
     * Fonction du rendu
     * @return Factory|View
     */
    public function render()
    {
        return view('livewire.location.show');
    }
}
