<?php

namespace App\Http\Controllers;

use App\Article;
use App\Articles;
use App\Type_articles;
use App\Categorie_articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('parametrage.articles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorie_articles = Categorie_articles::all();
        $type_articles = Type_articles::all();
        return view('parametrage.articles.create', compact('categorie_articles', 'type_articles'));
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
            'libelle' => 'required|string|min:3',
            'caution' => 'required|numeric|min:0',
            'categorie_article_id' => 'required|numeric',
            'type_article_id' => 'required|numeric',
            'description' => 'nullable',
            'article_photo' => 'nullable|file',
        ],[
            'libelle.required' => 'Le champ libéllé est obligatoire',
            'categorie_article_id.required' => 'Le champ catégorie est obligatoire',
            'type_article_id.required' => 'Le champ Type est obligatoire',
            'caution.required' => 'Le champ caution est obligatoire',
        ]);

        $data = Articles::create(array_merge($request->all(), ['user_id' => Auth::user()->id]));

        
        if ($request->has('article_photo')) {
            // creation du code
            $data->update(['code' => 'Art0-'.$data->id, 'article_photo' => $request->article_photo]);
        }else{
            $data->update(['code' => 'Art0-'.$data->id]);
        }

        if (isset($request->encore)) {
            return back()->with('success', 'Action Effectuée!');
        }else{
            return redirect()->route('articles.index')->with('success', 'Action Effectuée!');
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
        return view('parametrage.articles.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
