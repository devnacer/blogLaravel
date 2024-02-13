<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Category;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Http\Requests\ProfilRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\contactRequest;
use App\Mail\RegistrationMail;

class FrontendController extends Controller
{
    public function index(Article $article)
    {

        //$categories with articles count
        $categories = Category::withCount('articles')->get();

        //$articles
        // $articles = $article->latest()->paginate(2);
        $articles = $article->withCount('comments')->latest()->paginate(2);

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
        $profilsCount = Profil::count();
        $articleCount = Article::count();
        $categoryCount = Category::count();
        $latestArticle = Article::latest()->first();
        $commentCount = Comment::count();


        return view('front.about', compact('profilsCount', 'articleCount', 'categoryCount', 'latestArticle', 'commentCount'));
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

    public function create()
    {
        return view('front.registration');
    }

    public function store(ProfilRequest $request)
    {
        $formFields = $request->validated();
        $formFields['role'] = 'standard';
        $formFields['password'] = Hash::make($request->password);
        $profil = Profil::create($formFields);
        //send confirmation mail
        $name = $profil->name;
        $mail = new RegistrationMail($profil);
        Mail::to('kalache.nacer.kn@gmail.com')->send($mail);
        return view('front.confirmationMail', compact('name'));
    }

    public function verifyEmail($hash)
    {
        // Decode the hash
        $decodedHash = base64_decode($hash);
    
        // Check if decoding is successful
        if (!$decodedHash) {
            abort(404);
        }
    
        // Extract values from the hash
        [$createdAt, $id] = explode('///', $decodedHash);
    
        // Retrieve the profile using the ID
        $profile = Profil::findOrFail($id);
    
        // Check if the profile is already verified
        if ($profile->email_verified_at !== null) {
            return redirect()->route('login')->with('success', 'Your account is already verified. Log in now.');
        }
    
        // Check if the timestamp in the hash matches the profile's creation date
        if ($profile->created_at->toDateTimeString() !== $createdAt) {
            abort(404);
        }
    
        // Update the 'email_verified_at' column
        $profile->update(['email_verified_at' => now()]);
    
        // Redirect to the login route with a success message
        return redirect()->route('login')->with('success', 'Your account has been successfully verified. Log in now.');
    }
    
}
