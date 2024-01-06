<?php

namespace App\Http\Controllers\moduleEtudiant;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModuleEtudiant\SemestreRequest;
use App\Models\Semestre;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SemestreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $semestres = Semestre::paginate(5);
        return view('backoffice.pages.semestre.index',[
            'semestres' => $semestres
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $semestre = new Semestre();
        return view('backoffice.pages.semestre.form',[
            'semestre' => $semestre
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SemestreRequest $request)
    {
        Semestre::create($request->validated());
        return redirect()->route('admin.semestre.index')->with('success', 'Ajout effectué avec succès !');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Semestre $semestre)
    {
        return view('backoffice.pages.semestre.form',[
            'semestre' => $semestre
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Semestre $semestre )
    {
        $data = $request->validate([
            'semestre' => ['required',
            Rule::unique('semestres')->ignore($semestre->id)]
        ]);
        $semestre->update($data);
        return redirect()->route('admin.semestre.index')->with('success', 'Modification effectuée avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Semestre $semestre)
    {
        $semestre->delete();
        return redirect()->route('admin.semestre.index')->with('success', 'Suppression effectuée avec succès !');
    }
}
