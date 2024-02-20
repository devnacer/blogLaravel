<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use App\Mail\RegistrationMail;
use App\Mail\ResetPasswordMail;
use App\Http\Requests\ProfilRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function passwordResetSendEmail(ResetEmailRequest $request)
    {
        // Email address validation
        $request->validated();
    
        // Retrieve the user profile associated with the email
        $profile = Profil::where('email', $request->email)->firstOrFail();
    
        // Create a new instance of the ResetPasswordMail class
        $mail = new ResetPasswordMail($profile);
    
        // Send the email to the specified email address
        Mail::to('kalache.nacer.kn@gmail.com')->send($mail);
    
        // Redirect to the password reset page with a success message
        return redirect()->route('password.reset')->with([
            'success' => 'We have sent an email to your account to reset your password.',
        ]);
    }
    
    public function passwordEdit($hash)
    {
        return view('login.passwordEdit', compact('hash'));
    }

    public function passwordUpdate(Request $request, $hash)
    {
        // Decode the token
        $token = base64_decode($hash);

        // Find the password reset record by the token
        $passwordReset = PasswordReset::where('token', $token)->first();

        if (!$passwordReset) {
            abort(404, 'Page not found');
        }
        
        // Validate the request data
        $request->validate([
            'password' => 'required|min:3|confirmed',
        ]);

        // Find the user by email
        $user = Profil::where('email', $passwordReset->email)->first();

        if (!$user) {
            abort(404, 'Page not found');
        }

        // Reset the password
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        // Delete the password reset record
        $passwordReset->delete();

        // Redirect to the login page with a success message
        return redirect()->route('login')->with('success', 'Mot de passe mis à jour avec succès.');
    }
}
