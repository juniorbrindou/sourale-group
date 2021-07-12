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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Type_articles::destroy($id);
        return back()->with('success', 'Action Effectuée!');
    }
}
