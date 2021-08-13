<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Tarification;
use App\Type_articles;
use Illuminate\Http\Request;

class CategorieArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorieArticles = Categories::all();
        return view('parametrage.categorieArticles.index', compact('categorieArticles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parametrage.categorieArticles.create');
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
            'libelle' => 'required|string|min:1|unique:categories,libelle',
            'description' => 'nullable|min:0',
        ], [
            'libelle.required' => 'Le nom  de la catégorie est obligatoire'
        ]);
        $data = Categories::create($request->all());

        // creation du code
        $data->update(['code' => date("Ymd") . '0' . $data->id]);

        // insertion dans la table de tarif avec pour prix 0
        foreach (Type_articles::all() as $value) {
            Tarification::create([
                'categorie_article_id' => $data->id,
                'type_article_id' => $value->id,
            ]);
        }

        if (isset($request->encore)) {
            return back()->with('success', 'Action Effectuée!');
        } else {
            return redirect()->route('categorieArticles.index')->with('success', 'Action Effectuée!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorieArticle = Categories::whereId($id)->first();
        return view('parametrage.categorieArticles.edit', compact('categorieArticle'));
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
            'libelle' => 'required|string|min:1',
            'description' => 'nullable|min:0',
        ], [
            'libelle.required' => 'Le nom  de la catégorie est obligatoire'
        ]);

        Categories::whereId($id)->update([
            'libelle' => $request->libelle,
            'description' => $request->description,
        ]);

        return redirect()->route('categorieArticles.index')->with('success', 'Action Effectuée!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categories::destroy($id);
        return back()->with('success', 'Action Effectuée!');
    }
}
