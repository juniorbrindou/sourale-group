<?php

namespace App\Http\Controllers;

use App\Articles;
use App\Location;
use App\Evenements;
use Illuminate\Http\Request;

class EvennementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('locations.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evenement = Evenements::whereId($id)->firstOrFail();
        return view('location.terminee', compact('evenement'));

        /** plus tard penser corriger : afficher la liste des evennement et non des location
         *   il sagit de la table evennement qui est gérée et non la table location
         *   la location n'est qu'une table pivot entre article et evennement
         */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            ['statut_evenement' => 'required'],
            ['statut_evenement.*' => 'Aucun status choisis']
        );
        $evenement = Evenements::find($id);
        $locations = Location::where('evenement_id', '=', $evenement->id)->get();

        foreach ($locations as $key => $location) {
            $ligne[$key] = $location;
        }

        if ($evenement->status == 'DEVIS') {
            //En cours et annulé
            if ($request->statut_evenement == 'EN COURS') {
                //nombre d'articles ou nombre d'itérations
                $nbr_article = count($ligne);

                // utiliser pour verifier si l'operation de soustration es possible (article dispo doit etre supp a article commandé)
                $test = 0;

                // garder pour chaque ligne la qte article loué et l'id de l'article.
                // pour chaque ligne si la difference qte article dispo et commandé est est favorable test recois 1
                foreach ($ligne as $item => $value) {
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
                    foreach ($ligne as $item => $value) {
                        $article_en_bd = Articles::whereId($value->article_id)->first();
                        $article_en_bd->update(['qte_en_stock' => $article_en_bd->qte_en_stock - $value->qte_loue]);
                    }
                    toast('Action Effectuée avec succes!', 'success');
                    return redirect()->route('locations.index');
                } else {
                    alert()->warning('Articles Indisponible', 'Action Impossible! la quantité d\'article disponible est insuffisante pour démarrer cet evenement : pensez a cloturer les evenements terminés pour rendre les articles disponibles');
                    return redirect()->route('locations.index');
                }
            } elseif ($request->statut_evenement == 'ANNULÉ') {
                $evenement->update(['status' => 'ANNULÉ']);
                toast('L\'evenement a été annulé avec succes!', 'success');
                return redirect()->route('locations.index');
            } else {
                alert()->warning('Attention', 'Action Impossible! l\'évenement doit être en cours pour pouvoir executer cette action.');
                return redirect()->route('locations.index');
            }
        } elseif ($evenement->status == 'EN COURS') {
            //TERMINÉ
            if ($request->statut_evenement == 'TERMINÉ') {
                toast('Action éffectuée avec succes!', 'success');
                $evenement->update(['status' => 'TERMINÉ']);
                return redirect()->route('locations.index');
            } else {
                alert()->warning('Attention!', 'L\'évenement en cours ne peut être marqué que comme terminé.');
                return redirect()->route('locations.index');
            }
        } elseif ($evenement->status == 'ANNULÉ') {
            // EN COURS
            // todo : reflechir sur l'evenement annulé peut passer a DEVIS ou a en cour directement
        } elseif ($evenement->status == 'TERMINÉ') {

            //TERMINÉ -> CLOTURÉ
            if ($request->statut_evenement == 'CLOTURÉ') {
                $evenement->update(['status' => 'CLOTURÉ']);
                return redirect()->route('locations.index');
            } else {
                alert()->warning('Attention!', 'L\'évenement terminé ne peut être marqué que comme cloturé.');
                return redirect()->route('locations.index');
            }
        } else {
            return;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
