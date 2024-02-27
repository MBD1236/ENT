<?php

namespace App\Http\Controllers\ModuleEtudiant;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModuleEtudiant\AnneeUniversitaireRequest;
use App\Models\AnneeUniversitaire;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AnneeUniversitaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backoffice.pages.annee_universitaire.index',[
            'annee_universitaires' => AnneeUniversitaire::orderBy('created_at','desc')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $annee_universitaire = new AnneeUniversitaire();
        return view('backoffice.pages.annee_universitaire.form',[
            'annee_universitaire' => $annee_universitaire
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnneeUniversitaireRequest $request)
    {
        AnneeUniversitaire::create($request->validated());
        return redirect()->route('admin.annee_universitaire.index')->with('success', 'Ajout effectué avec succès !');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AnneeUniversitaire $annee_universitaire)
    {
        return view('backoffice.pages.annee_universitaire.form',[
            'annee_universitaire'=> $annee_universitaire
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnneeUniversitaireRequest $request, AnneeUniversitaire $annee_universitaire)
    {
       $annee_universitaire->update($request->validated());
       return redirect()->route('admin.annee_universitaire.index')->with('success','Modification effectue avec succes !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnneeUniversitaire $annee_universitaire)
    {
       $annee_universitaire->delete();
       return redirect()->route('admin.annee_universitaire.index')->with('success','Suppression effectue avec succes !');
    }
}
