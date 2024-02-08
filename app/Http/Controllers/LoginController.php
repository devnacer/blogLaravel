<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function show()
    {
        return view('login.show');
    }

    public function login(Request $request, Profil $profil)
    {
        $email = $request->login;
        $password = $request->password;
        $credentials = [
            'email' => $email,
            'password' => $password,
            'deleted_at' => null,
        ];

        if (Auth::attempt($credentials)  && $profil->trashed()) {
            $request->session()->regenerate();
            return redirect()->route('profil.home')->with([
                'success' => 'Vous êtes bien connecté ' . $email,
            ]);
        } else {
            return back()->withErrors([
                'login' => 'L\'email ou le mot de passe n\'est pas correct !!!',
            ])->onlyInput('login');
        }
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return to_route('login');
    }
}
