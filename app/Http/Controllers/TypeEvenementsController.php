<?php

namespace App\Http\Controllers;

use App\Fournisseurs;
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
