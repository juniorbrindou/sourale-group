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
        $articles = Articles::all();
        return view('parametrage.articles.index', compact('articles'));
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
            'article_photo' => 'nullable|file|image|mimes:jpeg,png,gif,jpg|max:2048',
        ],[
            'libelle.required' => 'Le champ libéllé est obligatoire',
            'categorie_article_id.required' => 'Le champ catégorie est obligatoire',
            'type_article_id.required' => 'Le champ Type est obligatoire',
            'caution.required' => 'Le champ caution est obligatoire',
        ]);

        

        $data = Articles::create(array_merge($request->all(), ['user_id' => Auth::user()->id]));

        if ($request->hasFile('article_photo')) {
            // stockage du nom du fichier et ses infos dans la variable file
            $file = $request->file('article_photo');
            // generer un nouveau nom de fichier avec l'extention : 2021 0 id _ libele.jpg
            $fileName = date('Y').'0'.$data->id .'_'. $request->libelle.'.'.$file->getClientOriginalExtension();
            // Save the file
            $path = $file->storeAs('articles', $fileName);
            
            // creation du code et ajout du lien de l'image dans la bd
            $data->update(['code' => date('Y').'0'.$data->id, 'article_photo' => $path]);

        }else{
            $data->update(['code' => '00'.$data->id]);
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
        $request->validate([
            'libelle' => 'required|min:0',
            'caution' => 'nullable|min:0',
            'description' => 'nullable|min:0',
            'article_photo' => 'nullable|min:0',
            'type_article_id' => 'nullable|min:0',
            'categorie_article_id' => 'nullable|min:0',
        ],[
            'libelle.required' =>'Le libelle  du fournisseur est obligatoire'
        ]);
        Fournisseurs::whereId($id)->update([
            'user_id' => Auth::user()->id,
            'caution' => $request->caution,
            'libelle' => $request->libelle,
            'description' => $request->description,
            'article_photo' => $request->article_photo,
            'type_article_id' => $request->type_article_id,
            'categorie_article_id' => $request->categorie_article_id,
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
        Articles::destroy($id);
        return back()->with('success', 'Action Effectuée!');
    }
}
