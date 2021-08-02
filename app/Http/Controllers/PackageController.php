<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Packages;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Packages::all();
        return view('parametrage.packages.index', compact('packages'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        return view('parametrage.packages.create', compact('categories'));
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {   //dd(request());
        $request->validate([
            'libelle' => 'required|string|min:1',
            'nbr_personnes' => 'required|numeric',
            'categorie_id' => 'nullable',
            'prix_location' => 'nullable|numeric',
            'description' => 'nullable|min:0',
        ], [
            'libelle.required' => 'Le libéllé est obligatoire',
            'nbr_personnes.required' => 'Ce champ est obligatoire',
            'prix_location.numeric' => 'Ce champ doit etre un nombre',
            'nbr_personnes.numeric' => 'Ce champ doit etre un nombre',
        ]);

        $data = Packages::create($request->all());

        // creation du code
        $data->update(['code' => date("Ymd") . '0' . $data->id]);

        if (isset($request->encore)) {
            return back()->with('success', 'Action Effectuée!');
        } else {
            return redirect()->route('packages.index')->with('success', 'Action Effectuée!');
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
        // $categorie_articles = Categorie_articles::where('id', '<>', $article->categorie_article->id)->get();
        // $type_articles = Type_articles::where('id', '<>', $article->type_article->id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package = Packages::whereId($id)->firstOrFail();
        $categories = Categories::all();


        return view('parametrage.packages.edit', compact('package'));
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
            'libelle.required' => 'Le libéllé est obligatoire'
        ]);
        Packages::whereId($id)->update([
            'libelle' => $request->libelle,
            'description' => $request->description,
        ]);

        return redirect()->route('packages.index')->with('success', 'Action Effectuée!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Packages::destroy($id);
        return back()->with('success', 'Action Effectuée!');
    }
}
