<?php

namespace App\Http\Controllers\ModuleEtudiant;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModuleEtudiant\EtudiantRequest;
use App\Http\Requests\ModuleEtudiant\UpdateEtudiantRequest;
use App\Imports\EtudiantImport;
use App\Models\Departement;
use App\Models\Etudiant;
use App\Models\Inscription;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


use Maatwebsite\Excel\Facades\Excel;


class EtudiantController extends Controller
{
    public function importer(Request $request) {
        if ($request->hasFile("fichier")) {
            $fichier = $request->file("fichier");
            Excel::import(new EtudiantImport, $fichier);
            return redirect()->route("admin.etudiant.index")->with("success","Import effectue avec succes !");
        }
        return redirect()->route("admin.etudiant.index")->with("error","Aucun fichier selectionne.");
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $ine = $request->searchIne;
        $query = Etudiant::query()->orderBy('created_at', 'desc');
        if($ine) { 
            $query->where('ine', $ine);
        }
        return view("backoffice.pages.etudiant.index", [
            "etudiants"=> $query->paginate(10),
            'input' => $ine
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $ine = $request->searchIne;
        if($ine) {
            $query = Etudiant::query()->orderBy('created_at', 'desc');
            $query->where('ine', $ine);
            $etudiants = $query->get();
            foreach ($etudiants as $etudiant) {
                return view("backoffice/pages/etudiant/form",[
                    'etudiant' => $etudiant
                ]);
            }

        }
        $etudiant = new Etudiant();

        return view("backoffice/pages/etudiant/form", [
            "etudiant"=> $etudiant,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EtudiantRequest $request)
    {
        try {
            $data = $request->validated();
                if ($request->hasFile('photo')) {
                    $photo = $request->file('photo');
                    if ($photo->isValid()) {
                        $nouveau_nom= $photo->getClientOriginalName();
                        $data['photo'] = $photo->storeAs('etudiants/etudiant', $nouveau_nom, 'public');
                    } else {
                        return redirect()->back()->withInput()->withErrors(['photo' => 'Erreur lors du téléchargement de la photo.']);
                    }
                }
                if ($request->hasFile('diplome')) {
                    $diplome = $request->file('diplome');
                    if ($diplome->isValid()) {
                        $nouveau_nom= $diplome->getClientOriginalName();
                        $data['diplome'] = $diplome->storeAs('etudiants/diplome', $nouveau_nom, 'public');
                    } else {
                        return redirect()->back()->withInput()->withErrors(['diplome' => 'Erreur lors du téléchargement de la photo.']);
                    }
                }
                if ($request->hasFile('releve_notes')) {
                    $releve_notes = $request->file('releve_notes');
                    if ($releve_notes->isValid()) {
                        $nouveau_nom= $releve_notes->getClientOriginalName();
                        $data['releve_notes'] = $releve_notes->storeAs('etudiants/releve_notes', $nouveau_nom, 'public');
                    } else {
                        return redirect()->back()->withInput()->withErrors(['diplome' => 'Erreur lors du téléchargement de la photo.']);
                    }
                }
                if ($request->hasFile('extrait_naissance')) {
                    $extrait_naissance = $request->file('extrait_naissance');
                    if ($extrait_naissance->isValid()) {
                        $nouveau_nom= $extrait_naissance->getClientOriginalName();
                        $data['extrait_naissance'] = $extrait_naissance->storeAs('etudiants/extrait_naissance', $nouveau_nom, 'public');
                    } else {
                        return redirect()->back()->withInput()->withErrors(['extrait_naissance' => 'Erreur lors du téléchargement de la photo.']);
                    }
                }
                if ($request->hasFile('certificat_nationalite')) {
                    $certificat_nationalite = $request->file('certificat_nationalite');
                    if ($certificat_nationalite->isValid()) {
                        $nouveau_nom= $certificat_nationalite->getClientOriginalName();
                        $data['certificat_nationalite'] = $certificat_nationalite->storeAs('etudiants/certificat_nationalite', $nouveau_nom, 'public');
                    } else {
                        return redirect()->back()->withInput()->withErrors(['certificat_nationalite' => 'Erreur lors du téléchargement de la photo.']);
                    }
                }
                if ($request->hasFile('certificat_medical')) {
                    $certificat_medical = $request->file('certificat_medical');
                    if ($certificat_medical->isValid()) {
                        $nouveau_nom= $certificat_medical->getClientOriginalName();
                        $data['certificat_medical'] = $certificat_medical->storeAs('etudiants/certificat_medical', $nouveau_nom, 'public');
                    } else {
                        return redirect()->back()->withInput()->withErrors(['certificat_medical' => 'Erreur lors du téléchargement de la photo.']);
                    }
                }
                // $data['user_id'] = Auth::user()->id;
                Etudiant::create($data);
                return redirect()->route('admin.etudiant.index')->with('success', 'Ajout effectué avec succès !');
        } catch (Exception $e) {
            return false;
        }
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etudiant $etudiant)
    {
        return view('backoffice.pages.etudiant.form', [
            'etudiant'=> $etudiant
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEtudiantRequest $request, Etudiant $etudiant)
    {
            $data = $request->validated();
            $photo = $data['photo'] ?? null;
            $diplome = $data['diplome'] ?? null;
            $releves_notes = $data['releve_notes'] ?? null;
            $certificat_nationalite = $data['certificat_nationalite'] ?? null;
            $certificat_medical = $data['certificat_medical'] ?? null;
            $extrait_naissance = $data['extrait_naissance'] ?? null;

        try {

            /** @var UploadedFile|null $photo */
            if ($photo !== null && !$photo->getError()) {
                if ($etudiant->photo) {
                    Storage::disk('public')->delete($etudiant->photo);
                }
                $nouveau_nom= $photo->getClientOriginalName();
                $data['photo'] = $photo->storeAs('etudiants/etudiant', $nouveau_nom, 'public');
            }
            /** @var UploadedFile|null $diplome */
            if ($diplome !== null && !$diplome->getError()) {
                if ($etudiant->diplome) {
                    Storage::disk('public')->delete($etudiant->diplome);
                }
                $nouveau_nom= $diplome->getClientOriginalName();
                $data['diplome'] = $diplome->storeAs('etudiants/diplome', $nouveau_nom, 'public');
            }
            /** @var UploadedFile|null $releve_notes */
            if ($releves_notes !== null && !$releves_notes->getError()) {
                if ($etudiant->releve_notes) {
                    Storage::disk('public')->delete($etudiant->releve_notes);
                }
                $nouveau_nom= $releve_notes->getClientOriginalName();
                $data['releve_notes'] = $releves_notes->storeAs('etudiants/releve_notes', $nouveau_nom, 'public');
            }
            /** @var UploadedFile|null $certificat_nationalite */
            if ($certificat_nationalite !== null && !$certificat_nationalite->getError()) {
                if ($etudiant->certificat_nationalite) {
                    Storage::disk('public')->delete($etudiant->certificat_nationalite);
                }
                $nouveau_nom= $certificat_nationalite->getClientOriginalName();
                $data['certificat_nationalite'] = $certificat_nationalite->storeAs('etudiants/certificat_nationalite', $nouveau_nom, 'public');
            }
            /** @var UploadedFile|null $certificat_medical */
            if ($certificat_medical !== null && !$certificat_medical->getError()) {
                if ($etudiant->certificat_medical) {
                    Storage::disk('public')->delete($etudiant->certificat_medical);
                }
                $nouveau_nom= $certificat_medical->getClientOriginalName();
                $data['certificat_medical'] = $certificat_medical->storeAs('etudiants/certificat_medical', $nouveau_nom, 'public');
            }
            /** @var UploadedFile|null $extrait_naissance */
            if ($extrait_naissance !== null && !$extrait_naissance->getError()) {
                if ($etudiant->extrait_naissance) {
                    Storage::disk('public')->delete($etudiant->extrait_naissance);
                }
                $nouveau_nom= $extrait_naissance->getClientOriginalName();
                $data['extrait_naissance'] = $extrait_naissance->storeAs('etudiants/extrait_naissance', $nouveau_nom, 'public');
            }

            $etudiant->update($data);
            return redirect()->route('admin.etudiant.index')->with('success', 'Modification effectuée avec succès !');
        } catch (Exception $e) {
            return to_route('admin.etudiant.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiant $etudiant)
    {
        if ($etudiant->photo) {
            Storage::disk('public')->delete($etudiant->photo);
        }
        if ($etudiant->diplome) {
            Storage::disk('public')->delete($etudiant->diplome);
        }
        if ($etudiant->releve_notes) {
            Storage::disk('public')->delete($etudiant->releve_notes);
        }
        if ($etudiant->certificat_medical) {
            Storage::disk('public')->delete($etudiant->certificat_medical);
        }
        if ($etudiant->certificat_nationalite) {
            Storage::disk('public')->delete($etudiant->certificat_nationalite);
        }
        if ($etudiant->extrait_naissance) {
            Storage::disk('public')->delete($etudiant->extrait_naissance);
        }

        $etudiant->delete();
        return to_route('admin.etudiant.index')->with('success','Suppression effectuée avec succès !');
    }
}
