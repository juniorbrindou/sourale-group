<?php

namespace App\Http\Controllers;

use App\Fournisseurs;
use App\Type_articles;
use App\Type_evenements;
use Illuminate\Http\Request;

class TypeEvenementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeEvenements = Type_evenements::all();
        return view('parametrage.typeEvenements.index', compact('typeEvenements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('parametrage.typeEvenements.create');
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
            'libelle' => 'required|string|min:1',
            'description' => 'nullable|min:0',
        ],[
            'libelle.required' =>'Le libéllé est obligatoire'
        ]);
        $data = Type_evenements::create($request->all());

        // creation du code
        $data->update(['code' => 'Event-0'.$data->id]);

        if (isset($request->encore)) {
            return back()->with('success', 'Action Effectuée!');
        }else{
            return redirect()->route('typeEvenements.index')->with('success', 'Action Effectuée!');
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
        Type_evenements::destroy($id);
        return back()->with('success', 'Action Effectuée!');
    }
}
