<?php

namespace App\Http\Controllers;

use App\Articles;
use App\Categories;
use App\Tarification;
use App\Type_articles;
use Illuminate\Http\Request;

class TarificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarifs = Tarification::all();
        return view('parametrage.tarifications.index', compact('tarifs'));
    }




    /**
     * Désactivé. cela se fait automatiquement
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'prix' => 'required|numeric|min:0',
        ], [
            'prix.required' => 'Le prix est obligatoire',
        ]);

        Tarification::create($request->all());

        if (isset($request->encore)) {
            return back()->with('success', 'Action Effectuée!');
        } else {
            return redirect()->route('tarifications.index')->with('success', 'Action Effectuée!');
        }
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
        $request->validate([
            'prix' => 'required|numeric|min:0',
        ], [
            'prix.required' => 'Le prix est obligatoire',
        ]);


        $data = Tarification::whereId($id)->firstOrFail();

        $data->update([
            'prix' => $request->prix,
        ]);

        // mise a jour du prix dans la table des articles
        $articlePrixToUpdate = Articles::where('categorie_id', '=', $data->categorie_article->id)->where('type_article_id', '=', $data->type_article->id)->get();

        foreach ($articlePrixToUpdate as $value) {
            $value->update(
                [
                    'prix_tarification' => $request->prix,
                    'tarification_id' => $id
                ]
            );
        }

        return redirect()->route('tarifications.index')->with('success', 'Action Effectuée!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarif = Tarification::findOrFail($id);
        try {
            $tarif->delete();
            return back()->with('success', 'Action Effectuée!');
        } catch (Illuminate\Database\QueryException $e) {
            return back()->with('error', 'Impossible de Supprimer cet Article');
        }
        return back();
    }
}
