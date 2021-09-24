<?php

namespace App\Http\Controllers;

use App\Articles;
use App\Categories;
use App\Tarification;
use App\Type_articles;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $categories = Categories::all();
        $type_articles = Type_articles::all();
        $articles = Articles::all();
        return view('parametrage.articles.index', compact('articles', 'categories', 'type_articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $categories = Categories::all();
        $type_articles = Type_articles::all();
        return view('parametrage.articles.create', compact('categories', 'type_articles'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|min:3|unique:articles',
            'categorie_id' => 'required|numeric',
            'type_article_id' => 'required|numeric',
            'description' => 'nullable',
            'article_photo' => 'nullable|file|image|mimes:jpeg,png,gif,jpg|max:2048',
        ], [
            'libelle.required' => 'Le champ libéllé est obligatoire',
            'libelle.unique' => 'La valeur de ce champ est déja utilisée',
            'categorie_id.required' => 'Le champ catégorie est obligatoire',
            'type_article_id.required' => 'Le champ Type est obligatoire',
        ]);

        $data = Articles::create(array_merge($request->all(), ['user_id' => Auth::user()->id]));

        $tarification = Tarification::where('categorie_article_id', '=', $request->categorie_id)->where('type_article_id', '=', $request->type_article_id)->first();

        if ($request->hasFile('article_photo')) {
            // stockage du nom du fichier et ses infos dans la variable file
            $file = $request->file('article_photo');
            // generer un nouveau nom de fichier avec l'extention : 2021 0 id _ libele.jpg
            $fileName =  date("Ymd") . '0' . $data->id . '_' . $request->libelle . '.' . $file->getClientOriginalExtension();
            // Save the file
            $path = $file->storeAs('articles', $fileName);

            // creation du code et ajout du lien de l'image dans la bd
            $data->update([
                'code' => date("Ymd") . '0' . $data->id,
                'article_photo' => $path,
                'prix_tarification' => $tarification->prix,
                'tarification_id' => $tarification->id
            ]);
        } else {
            $data->update([
                'code' => date("Ymd") . '0' . $data->id,
                'prix_tarification' => $tarification->prix,
                'tarification_id' => $tarification->id
            ]);
        }

         if (isset($request->encore)) {
            return back()->with('success', 'Article Enregistré!');
        } else {
            toast('Article Enregistré!', 'success');
            return redirect()->route('articles.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $article = Articles::whereId($id)->firstOrFail();
        return view('parametrage.articles.show', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string|min:3|unique:articles,libelle,' . $id,
            'categorie_id' => 'required|numeric',
            'type_article_id' => 'required|numeric',
            'description' => 'nullable',
            'article_photo' => 'nullable|file|image|mimes:jpeg,png,gif,jpg|max:2048',
        ], [
            'libelle.required' => 'Le champ libéllé est obligatoire',
            'libelle.unique' => 'Ce nom d\'article existe déjà',
            'categorie_id.required' => 'Le champ catégorie est obligatoire',
            'type_article_id.required' => 'Le champ Type est obligatoire',
        ]);

        $tarification = Tarification::where('categorie_article_id', '=', $request->categorie_id)->where('type_article_id', '=', $request->type_article_id)->first();

        $data = Articles::whereId($id)->firstOrFail();
        $data->update([
            'libelle' => $request->libelle,
            'categorie_id' => $request->categorie_id,
            'type_article_id' => $request->type_article_id,
            'description' => $request->description,
            'prix_tarification' => $tarification->prix,
            'tarification_id' => $tarification->id
        ]);

        if ($request->hasFile('article_photo')) {
            // stockage du nom du fichier et ses infos dans la variable file
            $file = $request->file('article_photo');

            // generer un nouveau nom de fichier avec l'extention : 2021 0 id _ libele.jpg
            $fileName = date('Y') . '0' . $data->id . '_' . $request->libelle . '.' . $file->getClientOriginalExtension();

            // Save the file
            $path = $file->storeAs('articles', $fileName);

            // creation du code et ajout du lien de l'image dans la bd
            $data->update([
                'article_photo' => $path,
                'prix_tarification' => $tarification->prix,
                'tarification_id' => $tarification->id

            ]);
        }
        toast('Article Modiffié!', 'success');
        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $article = Articles::findOrFail($id);
        try {
            $article->delete();
            return back()->with('success', 'Action Effectuée!');
        } catch (Illuminate\Database\QueryException $e) {
            return back()->with('error', 'Impossible de Supprimer cet Article');
        }
        return back();
    }
}
