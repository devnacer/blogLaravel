<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\contactRequest;
use App\Models\Comment;

class FrontendController extends Controller
{
    public function index(Article $article)
    {

        //$categories with articles count
        $categories = Category::withCount('articles')->get();

        //$articles
        $articles = $article->latest()->paginate(2);

        return view('front.index', compact('articles', 'categories'));
    }

    public function ArticlesByCategory($categoryName)
    {

        $category = Category::where('name', $categoryName)->firstOrFail();
        $articles = $category->articles()->latest()->paginate(2);

        // dd($articles);

        return view('front.indexArticle', compact('articles', 'category'));
    }

    public function showArticle(Article $article)
    {
        return view('front.showArticle', compact('article'));
    }

    public function about()
    {
        $articleCount = Article::count();
        $categoryCount = Category::count();
        $latestArticle = Article::latest()->first();


        return view('front.about', compact('articleCount', 'categoryCount', 'latestArticle'));
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function sendMessage(contactRequest $request)
    {
        //validate
        $request->validated();
        //send mail
        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $content = $request->content;
        $mail = new ContactMail($name, $email, $subject, $content);
        Mail::to('kalache.nacer.kn@gmail.com')->send($mail);
        return redirect()->route('front.contact')->with('success', 'Le message a bien été envoyé.');
    }

    public function storeComment(CommentRequest $request)
    {
        $formFields = $request->validated();

        $articleId = $request->article;

        $formFields['article_id'] = $articleId;
        // insertion
        Comment::create($formFields);

        return redirect()->route('front.showArticle', $articleId);
    }
}
