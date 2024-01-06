<?php

namespace App\Http\Controllers\ModuleEtudiant;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModuleEtudiant\NiveauRequest;
use App\Models\Niveau;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NiveauController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $niveaux = Niveau::paginate(4);
        return view('backoffice.pages.niveau.index',[
            'niveaux' => $niveaux
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $niveau = new Niveau();
        return view('backoffice.pages.niveau.form', [
            'niveau' => $niveau
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NiveauRequest $request)
    {
        Niveau::create($request->validated());
        return redirect()->route('admin.niveau.index')->with('success', 'Ajout effectué avec succès !');
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Niveau $niveau)
    {
        return view('backoffice.pages.niveau.form',[
            'niveau' => $niveau
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Niveau $niveau)
    {
        $data = $request->validate([
            'niveau' => [
                'required',
                Rule::unique('niveaux')->ignore($niveau->id)
                ]
            ]);
        $niveau->update($data);
        return redirect()->route('admin.niveau.index')->with('success', 'Modification effectuée avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Niveau $niveau)
    {
        $niveau->delete();
        return redirect()->route('admin.niveau.index')->with('success', 'Suppression effectuée avec succès !');
    }
}
