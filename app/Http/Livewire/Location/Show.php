<?php

namespace App\Http\Livewire\Location;

use App\Clients;
use App\Articles;
use App\Factures;
use App\Location;
use Carbon\Carbon;
use App\Evenements;
use function _\drop;
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
    public $tab_evenement = [];
    public $duree_evenement;
    public $article_libelle;
    public $qte_article;
    public $nb_jour;

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

        # vidage des champs du formulaire
        $this->makeEmptyFields();
    }




    public function addArticle()
    {
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

        $this->add();

        $this->tab_evenement['evenement_montant_total'] = array_sum(array_column($this->tab_locations, 'total_une_ligne'));
        $this->tab_evenement['evenement_caution'] = $this->tab_evenement['evenement_montant_total'] * 0.2;
    }







    public function addInBD()
    {
        if (!empty($this->tab_locations)) { # si tableau d'articles contient des éléments

            $type_evenement_id = Type_evenements::where('libelle', '=', $this->tab_evenement['type_evenement_libelle'])->first()->id;

            // modification des informations de l'évènement
            $this->evenement->update(
                [
                    'libelle' => $this->tab_evenement['evenement_libelle'],
                    'caution' => $this->tab_evenement['evenement_caution'],
                    'type_evenement_id' => $type_evenement_id,
                    'montant_total' => $this->tab_evenement['evenement_montant_total'],
                    'lieu' => $this->tab_evenement['evenement_lieu'],
                    'date_debut_evenement' => $this->tab_evenement['evenement_date_debut_evenement'],
                    'date_fin_evenement' => $this->tab_evenement['evenement_date_fin_evenement'],
                    'nbr_personne' => $this->tab_evenement['evenement_nbr_personne'],
                    'nb_jour' => Carbon::parse($this->tab_evenement['evenement_date_debut_evenement'])->DiffInDays($this->tab_evenement['evenement_date_fin_evenement']),
                ]
            );

            Factures::where('evenement_id', '=', $this->evenement->id)->update(
                [
                    "caution" => $this->tab_evenement['evenement_caution'],
                    "user_id" => Auth::user()->id,
                    "evenement_id" => $this->evenement->id,
                    "libelle" => 'Facture-' . $this->tab_evenement['evenement_libelle'],
                ]
            );

            #recupération de anciennes lignes Location en bd
            $old_locations = Location::where('evenement_id', '=', $this->evenement->id)->get();

            // dd($this->tab_locations);
            #suppression de anciennes lignes Location en bd
            foreach ($old_locations as $location) {
                Location::destroy($location->id);
            }

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

            Alert::success('Evenement Modifié', '');
            return redirect()->route('locations.index');
        } else {
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
        $this->validate([
            'evenement_libelle' => 'required',
            'evenement_nbr_personne' => 'required',
            'evenement_date_debut_evenement' => 'required',
            'type_evenement_libelle' => 'required',
            'evenement_date_fin_evenement' => 'required',
            'evenement_lieu' => 'required',
        ]);

        $this->tab_evenement['evenement_libelle'] = $this->evenement_libelle;
        $this->tab_evenement['evenement_caution'] = $this->evenement_caution;
        $this->tab_evenement['evenement_montant_total'] = $this->evenement_montant_total;
        $this->tab_evenement['evenement_lieu'] = $this->evenement_lieu;
        $this->tab_evenement['evenement_nbr_personne'] = $this->evenement_nbr_personne;
        $this->tab_evenement['evenement_date_debut_evenement'] = $this->evenement_date_debut_evenement;
        $this->tab_evenement['evenement_date_fin_evenement'] = $this->evenement_date_fin_evenement;
        $this->tab_evenement['type_evenement_libelle'] = $this->type_evenement_libelle;
        $this->tab_evenement['duree_evenement'] = Carbon::parse($this->evenement_date_debut_evenement)->DiffInDays($this->evenement_date_fin_evenement);
        // 2021-09-10T17:19
        // 2021-09-30T14:27
        $this->client;
        $this->currentStep = 3;
    }

    public function mount(Evenements $evenement)
    {
        $this->client = $evenement->client;
        $this->type_evenements = Type_evenements::orderBy('libelle', 'ASC')->get();
        #le type d'evenement préselectionné:
        $this->type_evenement_libelle = $evenement->type_evenement->libelle;
        $this->articles = Articles::orderBy('libelle', 'ASC')->get();
        #execution de foreach
        $tab = each((object) Location::where('evenement_id', '=', $evenement->id)->get(), function ($value, $key) {
            echo $value;
        });
        // dd($tab);
        foreach ($tab as $key => $value) {
            $this->tab_locations[$key]['article_libelle'] = $value->article->libelle;
            $this->tab_locations[$key]['article_categorie'] = $value->article->categorie->libelle;
            $this->tab_locations[$key]['qte_loue'] = $value->qte_loue;
            $this->tab_locations[$key]['nb_jour'] = $value->nb_jour;
            $this->tab_locations[$key]['prix'] = (int) $value->article->prix_tarification;
            $this->tab_locations[$key]['total_une_ligne'] = (int) $value->total_une_ligne;
        }
        // dd($this->tab_locations);
        $this->user = $tab[0]->user;

        #pour les champs de stepper evenement :
        $this->evenement_lieu = $evenement->lieu;
        $this->evenement_caution = $evenement->caution;
        $this->evenement_libelle = $evenement->libelle;
        $this->evenement_nbr_personne = $evenement->nbr_personne;
        $this->evenement_montant_total = $evenement->montant_total;
        $this->evenement_date_debut_evenement = \str_replace(' ', 'T', $evenement->date_debut_evenement);
        $this->evenement_date_fin_evenement = \str_replace(' ', 'T', $evenement->date_fin_evenement);
        $this->duree_evenement = Carbon::parse($this->evenement->date_debut_evenement)->DiffForHumans($this->evenement->date_fin_evenement, true);
    }

    /**
     * Suppprime une ligne (par les boutons supprimer de chaque ligne)
     */
    public function deleteLigne($item)
    {
        $this->tab_evenement['evenement_montant_total'] = $this->tab_evenement['evenement_montant_total'] - $this->tab_locations[$item]['total_une_ligne'];
        $this->tab_evenement['evenement_caution'] = $this->tab_evenement['evenement_montant_total'] * 0.2;
        unset($this->tab_locations[$item]);
        $this->tab_locations = array_values($this->tab_locations);
        $this->makeEmptyFields();
    }

    private function makeEmptyFields()
    {
        $this->article_libelle = '';
    }

    public function render()
    {
        return view('livewire.location.show');
    }
}
