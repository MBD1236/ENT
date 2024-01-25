<?php

namespace App\Http\Controllers\ModuleEtudiant;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModuleEtudiant\ProgrammeRequest;
use App\Models\Departement;
use App\Models\Programme;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ProgrammeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programmes = Programme::paginate(3);
        return view('backoffice.pages.programme.index',[
            'programmes' => $programmes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programme = new Programme();
        $departements = Departement::all();
        return view('backoffice.pages.programme.form',[
            'programme' => $programme,
            'departements' => $departements
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProgrammeRequest $request)
    {
        Programme::create($request->validated());
        return redirect()->route('admin.programme.index')->with('success', 'Ajout effectué avec succès !');

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Programme $programme)
    {
        return view('backoffice.pages.programme.form',[
            'programme' => $programme,
            'departements' => Departement::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Programme $programme)
    {
        $data = $request->validate([
            'nom' => [
                'required',
                Rule::unique('programmes')->ignore($programme->id)
            ],
            'departement_id' => [
                'required'
            ]
        ]);
        $programme->update($data);
        return redirect()->route('admin.programme.index')->with('success', 'Modification effectuée avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Programme $programme)
    {
        $programme->delete();
        return redirect()->route('admin.programme.index')->with('success', 'Suppression effectué avec succès !');
    }
}
