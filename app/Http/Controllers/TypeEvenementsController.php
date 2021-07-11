<?php

namespace App\Http\Controllers;

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
}
