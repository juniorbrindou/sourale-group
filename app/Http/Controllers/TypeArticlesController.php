<?php

namespace App\Http\Controllers;

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


}
