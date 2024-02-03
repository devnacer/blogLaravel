<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use App\Http\Requests\ProfilRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
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
        $profils = Profil::latest()->paginate(4);

        return view('profil/index', compact('profils'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Profil $profil)
    {
        $this->authorize('create', $profil);

        return view('profil.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProfilRequest $request)
    {
        $formFields = $request->validated();
        $formFields['password'] = Hash::make($request->password);
        Profil::create($formFields);

        return redirect()->route('profil.index')->with('success', "L'administrateur " . $request->name . ' a bien été ajouté');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profil $profil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profil $profil)
    {
        return view('profil.edit', compact('profil'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfilRequest $request, Profil $profil)
    {
        $this->authorize('update', $profil);

        $formFields = $request->validated();
        $formFields['password'] = Hash::make($request->password);
        $profil->fill($formFields)->save();

        return redirect()->route('profil.index')->with('success', "L'administrateur a bien été modifié");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profil $profil)
    {
        $profil->delete();
        return redirect()->route('profil.index')->with('success', "L'administrateur " . $profil->name . ' a bien été supprimé.');
    }

    public function home(Profil $profil)
    {
        // $latestArticles = Profil::with(['articles' => function ($query) {
        //     $query->latest()->take(3);
        // }])->latest()->get();


        $userArticles = $profil->articles()->latest()->take(3)->get();


        dd($userArticles) ;



        return view('profil.home', compact('latestArticles'));
    }
}
