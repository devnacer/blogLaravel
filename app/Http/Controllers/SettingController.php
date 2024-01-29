<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function show(Profil $profil){
        return view('setting.show', compact('profil'));
    }

    public function destroy(Profil $profil)
    {
        Session::flush();
        Auth::logout();
        $profil->delete();
        return redirect()->route('login');
    }

}
