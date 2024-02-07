<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Article $article){

        //$categories with articles count
        $categories = Category::withCount('articles')->get();
        
        //$articles
        $articles = $article->latest()->paginate(6);
        
        return view('front.index', compact('articles','categories'));
    }
}
