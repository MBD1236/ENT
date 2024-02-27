<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\TryCatch;

class HomeController extends Controller
{
    public function index(){
        $role = Auth::user()->role->role ?? '';
        if ($role === 'genie_info')
            return redirect()->route('genieinfo.etudiantindex');
        elseif ($role === 's_energie')
            return redirect()->route('scienceenergie.etudiantindex');
        elseif ($role === 's_technique')
            return redirect()->route('sciencetechnique.etudiantindex');
        elseif ($role === 'imp')
            return redirect()->route('imp.etudiantindex');
        elseif ($role === 'teb')
            return redirect()->route('teb.etudiantindex');
        elseif ($role === 't_laboratoire')
            return redirect()->route('techniquelaboratoire.etudiantindex');
        elseif ($role === 'scolarite')
            return redirect()->route('scolarite.etudiant.index');
        elseif ($role === 'admin')
            return redirect()->route('admin.etudiant.index');
    }
    public function deconnection() {
        return redirect()->route('login');
    }

    public function formVerification() {
        Role::create([
            'role' => 't_laboratoire'
        ]);
       
       
        User::create([
            'nom' => 'john7',
            'prenom' => 'doe7',
            'email' => 'john7@doe7.gn',
            'matricule' => '7777',
            'role_id' => 8,
            'password' => Hash::make('1234'),
        ]);
        
        return view('auth.verify-matricule');
    }

    public function verification(Request $request) {
        $matricule = $request->validate([
            'matricule' => ['required']
        ]);
        $matriculeVerified = Etudiant::where('ine', $matricule)->first();
        if ($matriculeVerified) {
            return redirect()->route('register');
        }
        else {
            return redirect()->back()->with('error', 'INE non trouvé');
        }
    }
}
