<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use App\Mail\RegistrationMail;
use App\Mail\ResetPasswordMail;
use App\Http\Requests\ProfilRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ResetEmailRequest;

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

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Check if the user profile is trashed
            if ($profil->trashed()) {
                // Check if email is verified
                if ($user->email_verified_at !== null) {
                    $request->session()->regenerate();
                    return redirect()->route('profil.home')->with([
                        'success' => 'Vous êtes bien connecté ' . $email,
                    ]);
                } else {
                    // ReSend confirmation mail
                    $profil = Profil::find(Auth::user()->id);
                    $mail = new RegistrationMail($profil);
                    Mail::to('kalache.nacer.kn@gmail.com')->send($mail);
                    Auth::logout();
                    $request->session()->invalidate();
                    return redirect()->route('login')->with([
                        'warning' => 'Votre compte n\'a pas encore été activé. Un email de validation a été envoyé à l\'adresse : ' . $email,
                    ]);
                }
            } else {
                // If the profile is not trashed, logout and show an error
                Auth::logout();
                return back()->withErrors([
                    'login' => 'Le profil associé à cet utilisateur est désactivé.',
                ])->onlyInput('login');
            }
        } else {
            // If login attempt fails, show an error
            return back()->withErrors([
                'login' => 'L\'email ou le mot de passe n\'est pas correct !!!',
            ])->onlyInput('login');
        }
    }


    public function logout()
    {
        Session::flush();
        Auth::logout();
        return to_route('login');
    }

    public function passwordReset()
    {
        return view('login.passwordReset');
    }

    public function passwordResetSendMail(ResetEmailRequest $request)
    {

        // Validation de l'adresse e-mail
        $request->validated();
        
        // Logique d'envoi de l'e-mail de réinitialisation de mot de passe
        
        // ReSend confirmation mail
        
        $profil = Profil::where('email', $request->email)->firstOrFail();;
        
        $mail = new ResetPasswordMail($profil);
        dd($mail);
        // Mail::to('kalache.nacer.kn@gmail.com')->send($mail);

        // Redirection vers la page de réinitialisation de mot de passe avec un message de succès
        return redirect()->route('password.reset')->with([
            'success' => 'Nous avons envoyé un e-mail à votre compte pour réinitialiser votre mot de passe.',
        ]);
    }
}
