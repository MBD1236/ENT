<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // public function login() {
    //     return view('auth.login');
    // }

    // public function doLogin(LoginRequest $request) {
    //     $credentials = $request->validated();
    //     if (Auth::attempt($credentials)) {
    //         $request->session()->regenerate();
    //         $role = Auth::user()->role->role;
    //         if ($role === 'genie_info' || $role === 's_energie')
    //                 return redirect()->intended(route('genieinfo.etudiantindex'));
    //         elseif ($role === 'scolarite')
    //                 return redirect()->intended(route('scolarite.etudiant.index'));
 
    //     }

    //     return to_route('login')->withErrors([
    //         'matricule' => 'Identifiants incorrects'
    //     ])->onlyInput('email');
    // }

    // public function logout() {
    //     Auth::logout();
    //     return to_route('login');
    // }
}
