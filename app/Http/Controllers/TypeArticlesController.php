<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Tarification;
use App\Type_articles;
use Illuminate\Http\Request;

class TypeArticlesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeArticles = Type_articles::all();
        return view('parametrage.typeArticles.index', compact('typeArticles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parametrage.typeArticles.create');
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
            'libelle' => 'required|string|min:1|unique:type_articles,libelle',
            'description' => 'nullable|min:0',
        ], [
            'libelle.required' => 'Le libéllé est obligatoire',
            'libelle.unique' => 'Cette valeur existe déja',
        ]);
        $data = Type_articles::create($request->all());

        // creation du code
        $data->update(['code' => date("Ymd") . '0' . $data->id]);

        foreach (Categories::all() as $value) {
            Tarification::create([
                'categorie_article_id' => $value->id,
                'type_article_id' => $data->id,
            ]);
        }

        if (isset($request->encore)) {
            return back()->with('success', 'Action Effectuée!');
        } else {
            return redirect()->route('typeArticles.index')->with('success', 'Action Effectuée!');
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
        $typeArticle = Type_articles::whereId($id)->first();
        return view('parametrage.typeArticles.edit', compact('typeArticle'));
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
            'libelle' => 'required|string|min:1|unique:type_articles,libelle,' . $id,
            'description' => 'nullable|min:0',
        ], [
            'libelle.required' => 'Le libéllé est obligatoire',
            'libelle.unique' => 'Cette valeur existe déja',
        ]);
        Type_articles::whereId($id)->update([
            'libelle' => $request->libelle,
            'description' => $request->description,
        ]);

        return redirect()->route('typeArticles.index')->with('success', 'Action Effectuée!');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $typeArticle = Type_articles::findOrFail($id);

        try {
            Type_articles::destroy($id);
        } catch (Illuminate\Database\QueryException $e) {
            return back()->with('error', 'Une erreur s\'est produite!');
        }
        return back()->with('success', 'Action Effectuée!');
    }
}
