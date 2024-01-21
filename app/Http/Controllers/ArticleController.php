<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\articleResquest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::latest()->paginate(4);
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('article.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(articleResquest $request)
    {
        $formFields = $request->validated();

        // image
        if ($request->hasFile('image')) {

            $formFields['image'] = $request->file('image')->store('article', 'public');
        }

        $formFields['profil_id'] = Auth::id();

        //insertion
        Article::create($formFields);
        
        return redirect()->route('category.index')->with('success', 'L\'article "' . $formFields['title'] . '" a bien été ajouté.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('article.edit', compact('article','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(articleResquest $request, Article $article)
    {
        $formFields = $request->validated();

        // image
        if ($request->hasFile('image')) {

            $formFields['image'] = $request->file('image')->store('article', 'public');
        }else{
            $formFields['image'] = $article->image;
        }

        $formFields['profil_id'] = Auth::id();

        //insertion
        $article->fill($formFields)->save();
        
        return redirect()->route('article.index')->with('success', 'L\'article "' . $formFields['title'] . '" a bien été modifié.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('article.index')->with('success', "L'article «" . $article->title . "» a bien été supprimé");
        
    }
}
