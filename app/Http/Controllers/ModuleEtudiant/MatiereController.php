<?php

namespace App\Http\Controllers\moduleEtudiant;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModuleEtudiant\MatiereRequest;
use App\Models\Matiere;
use App\Models\Programme;
use App\Models\Semestre;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {

        $programme = $request->programme;
        $query = Matiere::query()->orderBy('created_at', 'desc');

        if ($programme) {
            $query->where('programme_id', $programme);
        }

        return view('backoffice.pages.matiere.index', [
            'matieres' => $query->paginate(10),
            'semestres' => Semestre::select('id', 'semestre')->get(),
            'programmes' => Programme::select('id', 'programme')->get(),
            'input' => $request->all('programme')
        ]);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $matiere = new Matiere();
        
        return view('backoffice.pages.matiere.form',[
            'matiere' => $matiere,
            'semestres' => Semestre::select('id', 'semestre')->get(),
            'programmes' => Programme::select('id', 'programme')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MatiereRequest $request)
    {
        Matiere::create($request->validated());
        return redirect()->route('admin.matiere.index')->with('success', 'Ajout effectué avec succès !');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matiere $matiere)
    {
        return view('backoffice.pages.matiere.form',[
            'matiere' => $matiere,
            'semestres' => Semestre::select('id', 'semestre')->get(),
            'programmes' => Programme::select('id', 'programme')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Matiere $matiere)
    {
        $data = $request->validate([
            'matiere' => ['required',
                Rule::unique('matieres')->ignore($matiere->id)],
            'semestre_id' => ['required'],
            'programme_id' => ['required']
        ]);
        $matiere->update($data);
        return redirect()->route('admin.matiere.index')->with('success', 'Modification effectuée avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Matiere $matiere)
    {
        $matiere->delete();
        return redirect()->route('admin.matiere.index')->with('success', 'Suppression effectuée avec succès !');
    }
}
