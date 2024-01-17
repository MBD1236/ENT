<?php

namespace App\Http\Controllers\ModuleEtudiant;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModuleEtudiant\DepartementRequest;
use App\Models\Departement;
use App\Models\Inscription;
use App\Models\Niveau;
use App\Models\Programme;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class DepartementController extends Controller
{


        public function pdf()
        {
            $inscriptions = Inscription::query()->orderBy("created_at","desc")->get();

            $pdf = Pdf::loadView('pdf', compact('inscriptions'));
                // dd($pdf->stream());
            return $pdf->stream('liste_etudiants.pdf');
        }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backoffice.pages.departement.index', [
            'departements' => Departement::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departement = new Departement();
        return view('backoffice.pages.departement.form', [
            'departement' => $departement
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartementRequest $request)
    {
       $data = $request->validated();
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            if ($photo->isValid()) {
                $nouveau_nom= $photo->getClientOriginalName();
                $photoPath = $photo->storeAs('departements', $nouveau_nom, 'public');
                $data['photo'] = $photoPath;
            } else {
                return redirect()->back()->withInput()->withErrors(['photo' => 'Erreur lors du téléchargement de la photo.']);
            }
        }
        // $data['user_id'] = Auth::user()->id;
        Departement::create($data);
        return redirect()->route('admin.departement.index')->with('success', 'Ajout effectué avec succès !');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departement $departement)
    {
        return view('backoffice.pages.departement.form', [
            'departement' => $departement
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartementRequest $request, Departement $departement)
    {
        $data = $request->validated();
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');

            if ($departement->photo) {
                Storage::disk('public')->delete($departement->photo);
            }
            $nouveau_nom= $photo->getClientOriginalName();
            $data['photo'] = $photo->storeAs('departements', $nouveau_nom, 'public');
        }

        $departement->update($data);
        return redirect()->route('admin.departement.index')->with('success', 'Modification effectuée avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departement $departement)
    {
        if($departement->photo){
            Storage::disk('public')->delete($departement->photo);
        }
        $departement->delete();
        return redirect()->route('admin.departement.index')->with('success', 'Suppression effectuée avec succès !');
    }
}
