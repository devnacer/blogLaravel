<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\articleResquest;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        // Convert the tags string into an array
        $tagsArray = $request->input('tags') ? explode(',', $request->input('tags')) : [];
        // Remove any leading or trailing spaces from each tag
        $tagsArray = array_map('trim', $tagsArray);
        // Filter out empty tags
        $tagsArray = array_filter($tagsArray);

        // Validate form fields
        $validatedData = $request->validated();

        // Process tags
        $validatedData['tags'] = $tagsArray;

        // Process image
        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('article', 'public');
        }

        // Add current user's ID
        $validatedData['profil_id'] = Auth::id();

        // Insert the article
        Article::create($validatedData);

        return redirect()->route('article.index')->with('success', 'The article "' . $validatedData['title'] . '" has been successfully added.');
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
        return view('article.edit', compact('article', 'categories'));
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
        } else {
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

    // ArticlesController.php
    public function indexArticlesProfil()
    {
        $id = Auth::id();
        $articles = Article::where('profil_id', $id)->latest()->paginate(2);

        return view('article.indexArticlesProfil', compact('articles'));
    }

    // admin latest 3 articles
    public function home()
    {
        // $latestArticles = Profil::with(['articles' => function ($query) {
        //     $query->latest()->take(3);
        // }])->latest()->get();

        $adminConnected = Auth::user();

        $latestArticles = DB::table('articles')
            ->join('profils', 'profils.id', '=', 'articles.profil_id')
            ->where('profils.id', '=', $adminConnected->id)
            ->select('articles.*')
            ->orderBy('articles.created_at', 'desc')
            ->take(3)
            ->get();

        return view('article.home', compact('latestArticles'));
    }
}
