<?php

namespace App\Http\Livewire\Location;

use App\Articles;
use App\Evenements;
use App\Location;
use Livewire\Component;

class Index extends Component
{
    public $evenements;
    public $statut_evenement;
    public $tab_locations;
    public $ligne = [];
    public $evenement_id;
    public $test2;

    public function update_statut()
    {
        if (isset($this->statut_evenement)) {
            $tab = explode('.', $this->statut_evenement);
            $this->evenement_id = $tab[0];
            $this->statut_evenement = $tab[1];
        } else {
            session()->flash('error', 'Post successfully updated.');
            return redirect()->route('locations.index');
        }
        $this->validate(['statut_evenement' => 'required'], ['statut_evenement.*' => 'Aucun status choisis']);
        $evenement = Evenements::find($this->evenement_id);
        $locations = Location::where('evenement_id', '=', $evenement->id)->get();

        foreach ($locations as $key => $location) {
            $this->ligne[$key] = $location;
        }


        if ($evenement->status == 'ENREGISTRÉ') {
            //En cours et annulé
            if ($this->statut_evenement == 'EN COURS') {
                //nombre d'articles ou nombre d'itérations
                $nbr_article = count($this->ligne);

                // utiliser pour verifier si l'operation de soustration es possible (article dispo doit etre supp a article commandé)
                $test = 0;

                // garder pour chaque ligne la qte article loué et l'id de l'article.
                // pour chaque ligne si la difference qte article dispo et commandé est est favorable test recois 1
                foreach ($this->ligne as $item => $value) {
                    $articles_and_qte_loue[$item]['qte_loue'] = $value->qte_loue;
                    $articles_and_qte_loue[$item]['article_id_loue'] = $value->article_id;
                    $article_en_bd = Articles::whereId($value->article_id)->first();
                    if ($article_en_bd->qte_en_stock >= $value->qte_loue) {
                        $test++;
                    } else {
                        $test--;
                    }
                }

                //si au final test est egal au nombre diteration (nombre de reussite est total)
                // alors le status de vient update et la soustration s'éffectue
                if ($test === $nbr_article) {
                    $evenement->update(['status' => 'EN COURS']);
                    foreach ($this->ligne as $item => $value) {
                        $article_en_bd = Articles::whereId($value->article_id)->first();
                        $article_en_bd->update(['qte_en_stock' => $article_en_bd->qte_en_stock - $value->qte_loue]);
                    }
                } else {
                    session()->flash('error', 'Post successfully updated.');
                    return redirect()->route('locations.index');
                }


            } elseif ($this->statut_evenement == 'ANNULÉ') {
                $evenement->update(['status' => 'ANNULÉ']);
                session()->flash('error', 'posd');
            } else {
                //todo : gerer le lancement des erreurs flash
                // (action impossible l'article l'évenement doit etre en cours pour pouvoir eecuter cette action)
                session()->flash('error', 'Post successfully updated.');
//                $this->emitTo('livewire-toast', 'show', 'Project Added Successfully');
//                return redirect()->route('locations.index');
            }


        } elseif ($evenement->status == 'EN COURS') {
            //TERMINÉ
            if ($this->statut_evenement == 'TERMINÉ') {
                $evenement->update(['status' => 'TERMINÉ']);
            } else {
                // todo: gerer les erreurs flash (action impossible)
                dd('impossibles');
            }
        } elseif ($evenement->status == 'ANNULÉ') {
            // EN COURS
            // todo : reflechir sur l'evenement annulé peut passer a enregistrer ou a en cour directement
            /*            if ($this->statut_evenement =='EN COURS')
                        {
                            $evenement->update(['status'=>'TERMINÉ']);
                        }else{
                            // todo: gerer les erreurs flash (action impossible)
                            dd('impossibles');
                        }*/
        } else {
            dd('nothing');
        }


//        $this->tab_locations = Location::where('evenement_id', '=', $evenement->id)->get();
//
//        foreach ($this->tab_locations as $item => $value) {
//            $this->ligne[$item]['article'] = $value->article;
//            $this->ligne[$item]['qte_loue'] = $value->qte_loue;
//            $this->ligne[$item]['nbr_jour'] = $value->nb_jour;
//        }
//        if ($this->statut_evenement == "EN COURS") {
//
//            /*verifiaction de la possibilité de l'action :
//             *  ici on verifie si les quantités sont disponibles en bd
//            */
//            foreach ($this->ligne as $key => $value) {
//                $article = Articles::whereId($this->ligne[$key]['article']['id'])->first();
//
//                /*on fait un calcul dont le resultat est stocker dans  $qte_reste( la qte en stock - la qte louée)*/
//                $qte_reste = $article->qte_en_stock - $value['qte_loue'];
//                $test = 0;
//                if ($qte_reste >= 0) {
//                    $test++;
//                    $article->update(['qte_en_stock' => $qte_reste]);
//                } else {
//                    $test--;
//                }
//            }
//            if ($test >= count($this->ligne)) {
//                foreach ($this->ligne as $key => $value) {
//                    $qte_reste = $article->qte_en_stock - $value['qte_loue'];
//                    $article->update(['qte_en_stock' => $qte_reste]);
//                }
//            } else {
//                $this->dispatchBrowserEvent('sweetAlert', [
//                    'title' => 'Article Insuffisant',
//                    'timer' => 5000,
//                    'icon' => 'error',
//                ]);
//            }
//        }
//        $evenement->update(['status' => $this->statut_evenement]);
    }


    public function getQueryString()
    {
        return [];
    }


    public function mount()
    {
        $this->evenements = Evenements::all();
    }

    public function render()
    {
        $this->test2 = 'bonjour';
        return view('livewire.location.index');
    }
}
