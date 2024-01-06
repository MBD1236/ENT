<?php

namespace App\Http\Controllers\ModuleEtudiant;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModuleEtudiant\EnseignantRequest;
use App\Models\Enseignant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EnseignantController extends Controller
{
   public function index()
    {
        return view('backoffice.pages.enseignant.index', [
            'enseignants' => Enseignant::orderBy('created_at','desc')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $enseignant = new Enseignant();
        return view('backoffice.pages.enseignant.form', [
            'enseignant' => $enseignant
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EnseignantRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            if ($photo->isValid()) {
                $nouveau_nom= $photo->getClientOriginalName();
                $photoPath = $photo->storeAs('enseignants', $nouveau_nom, 'public');
                $data['photo'] = $photoPath;
            } else {
                return redirect()->back()->withInput()->withErrors(['photo' => 'Erreur lors du téléchargement de la photo.']);
            }
        }
        
        // $data['user_id'] = Auth::user()->id;
        Enseignant::create($data);
        return redirect()->route('admin.enseignant.index')->with('success', 'Ajout effectué avec succès !');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enseignant $enseignant)
    {
        return view('backoffice.pages.enseignant.form', [
            'enseignant' => $enseignant
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EnseignantRequest $request, Enseignant $enseignant)
    {
        $data = $request->validated();
        if($request->hasFile('photo')){
            $photo = $request->file('photo');

            if($enseignant->photo){
                Storage::disk('public')->delete($enseignant->photo);
            }
            $nouveau_nom= $photo->getClientOriginalName();
            $data['photo'] = $photo->storeAs('enseignants', $nouveau_nom, 'public');
        }

        $enseignant->update($data);
        return redirect()->route('admin.enseignant.index')->with('success','Modification effectuée avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enseignant $enseignant)
    {
        if($enseignant->photo){
            Storage::disk('public')->delete($enseignant->photo);
        }
        $enseignant->delete();
        return redirect()->route('admin.enseignant.index')->with('success','Suppression effectuee avec succes');
    }

}
