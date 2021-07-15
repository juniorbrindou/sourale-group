<?php

namespace App\Http\Controllers;

use App\Fournisseurs;
use Illuminate\Http\Request;

class FournisseursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fournisseurs = Fournisseurs::all();
        return view('parametrage.fournisseurs.index', compact('fournisseurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('parametrage.fournisseurs.create');
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
            'nom' => 'required|min:0',
            'contact' => 'nullable|min:0',
            'adresse' => 'nullable|min:0',
        ],[
            'nom.required' =>'Le nom  du fournisseur est obligatoire'
        ]);
        $data = Fournisseurs::create($request->all());

        // creation du code
        $data->update(['code' => 'four-0'.$data->id]);

        if (isset($request->encore)) {
            return back()->with('success', 'Action Effectuée!');
        }else{
            return redirect()->route('fournisseurs.index')->with('success', 'Action Effectuée!');
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
        $fournisseur = Fournisseurs::whereId($id)->first(); 
        return view('parametrage.fournisseurs.edit',compact('fournisseur'));
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
            'nom' => 'required|min:0',
            'contact' => 'nullable|min:0',
            'adresse' => 'nullable|min:0',
        ],[
            'nom.required' =>'Le nom  du fournisseur est obligatoire'
        ]);
        Fournisseurs::whereId($id)->update([
            'nom' => $request->nom,
            'contact' => $request->contact,
            'adresse' => $request->adresse,
        ]);

        return redirect()->route('fournisseurs.index')->with('success', 'Action Effectuée!');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Fournisseurs::destroy($id);
        return back()->with('success', 'Action Effectuée!');
    }
}