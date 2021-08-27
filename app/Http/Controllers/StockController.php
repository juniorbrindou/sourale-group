<?php

namespace App\Http\Controllers;

use App\Articles;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $articles = Articles::all();
        return view('stock.index', compact('articles'));
    }
}
