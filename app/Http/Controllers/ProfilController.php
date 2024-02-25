<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProfilRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(Profil::class, 'profil'); // Assuming 'profil' is the resource key for Profil model
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profils = Profil::latest()->paginate(4);

        return view('profil/index', compact('profils'));
    }

    public function indexAdmins()
    {
        $profils = Profil::where('role', 'admin')
        ->orWhere('role', 'superAdmin')
        ->latest()
        ->paginate(4);

        return view('profil.indexAdmins', compact('profils'));
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
    // public function show(Profil $profil)
    // {
    //     //
    // }

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
    public function update(Request $request, Profil $profil)
    {
        if($profil->role = 'standard' || $profil->role = 'admin'){
            // Define validation rules
            $rules = [
                'name' => 'required|min:2|max:55',
                'email' => 'required|email|unique:profils,email,' . $profil->id,
                // 'role' => 'required|in:admin,superAdmin,standard',
                'password' => 'nullable|min:3|confirmed',
            ];
    
            // Validate the request
            $formFields = $request->validate($rules);
    
            if ($profil->role === 'standard') {
                $formFields['role'] = 'standard';
            }
    
            if ($profil->role === 'admin') {
                $formFields['role'] = 'admin';
            };

        }
        if($profil->role = 'superAdmin' || $profil->role = 'admin'){
            // Define validation rules
            $rules = [
                'name' => 'required|min:2|max:55',
                'email' => 'required|email|unique:profils,email,' . $profil->id,
                'role' => 'required|in:admin,superAdmin,standard',
                'password' => 'nullable|min:3|confirmed',
            ];
    
            // Validate the request
            $formFields = $request->validate($rules);
        }
        
        $formFields['password'] = Hash::make($request->password);
        $profil->fill($formFields)->save();

        return redirect()->back()->with('success', "La modification a été bien été réussie");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profil $profil)
    {
        $profil->delete();
        return redirect()->back()->with('success', "L'administrateur " . $profil->name . ' a bien été supprimé.');
    }
}
