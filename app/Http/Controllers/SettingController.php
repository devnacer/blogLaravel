<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(Profil $profil)
    {
        return view('setting.edit', compact('profil'));
    }

    public function update(Profil $profil, Request $request)
    {


        // Define validation rules
        $rules = [
            'name' => 'required|min:2|max:55',
            'email' => 'required|email|unique:profils,email,' . $profil->id,
            'password' => 'required|min:3|confirmed',
        ];

        // Validate the request
        $formFields = $request->validate($rules);

        if ($profil->role === 'standard') {
            $formFields['role'] = 'standard';
        }

        if ($profil->role === 'admin') {
            $formFields['role'] = 'admin';
        };

        if ($profil->role === 'superAdmin') {
            $formFields['role'] = 'superAdmin';
        };



        $formFields['password'] = Hash::make($request->password);
        $profil->fill($formFields)->save();

        return redirect()->back()->with('success', "La modification a été bien réussie");
    }

    public function destroy(Profil $profil)
    {
        Session::flush();
        Auth::logout();
        $profil->delete();
        return redirect()->route('login');
    }
}
