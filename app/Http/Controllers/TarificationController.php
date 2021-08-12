<?php

namespace App\Http\Controllers;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        $type_articles = Type_articles::all();
        return view('parametrage.tarifications.create', compact('categories', 'type_articles'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'prix' => 'required|string|min:1',
            'type_article_id' => 'required|numeric',
            'categorie_article_id' => 'required|numeric',
        ], [
            'prix.required' => 'ce champ est obligatoire',
        ]);

        Tarification::create($request->all());

        if (isset($request->encore)) {
            return back()->with('success', 'Action Effectuée!');
        } else {
            return redirect()->route('tarifications.index')->with('success', 'Action Effectuée!');
        }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarif = Tarification::whereId($id)->firstOrFail();
        $categories = Categories::where('id', '<>', $tarif->categorie_article_id)->get();
        $type_articles = Type_articles::where('id', '<>', $tarif->type_article_id)->get();
        return view('parametrage.tarifications.edit', compact('tarif', 'categories', 'type_articles'));
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
            'prix' => 'required|string|min:1',
            'type_article_id' => 'required|numeric',
            'categorie_article_id' => 'required|numeric',
        ], [
            'prix.required' => 'ce champ est obligatoire',
        ]);

        $data = Tarification::whereId($id)->firstOrFail();
        $data->update([
            'prix' => $request->prix,
            'categorie_id' => $request->categorie_id,
            'type_article_id' => $request->type_article_id,
            'categorie_article_id' => $request->categorie_article_id,
        ]);

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
