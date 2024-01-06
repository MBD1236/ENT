<?php

namespace App\Http\Controllers\ModuleEtudiant;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModuleEtudiant\InscriptionRequest;
use App\Models\Etudiant;
use App\Models\Inscription;
use App\Models\Niveau;
use App\Models\Programme;
use App\Models\Promotion;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //je recupère le matricule de l'etudiant
        $etudiant = $request->searchEtudiant;

        $query = Inscription::query()->orderBy('created_at','desc');
        if ($etudiant) {
                $query->where(function ($query) use ($etudiant) {
                // Recherche de l'INE
                $query->orWhereHas('etudiant', function ($query) use ($etudiant) {
                    $query->where('ine', 'LIKE', "%{$etudiant}%");
                });
                // Recherche de promotion
                $query->orWhereHas('promotion', function ($query) use ($etudiant) {
                    $query->where('promotion', 'LIKE', "%{$etudiant}%");
                });

                // Recherche de session
                $query->orWhereHas('session', function ($query) use ($etudiant) {
                    $query->where('session', 'LIKE', '%' . $etudiant . '%');
                });

                // Recherche de programme
                $query->orWhereHas('programme', function ($query) use ($etudiant) {
                    $query->where('nom', 'LIKE', "%{$etudiant}%");
                });

                // Recherche de niveau
                $query->orWhereHas("niveau", function ($query) use ($etudiant) {
                    $query->where("niveau", "LIKE", "%{$etudiant}%");
                });
            });
           
        }   
        return view('backoffice.pages.inscription.index',[
            'inscriptions'=> $query->paginate(10),
            'lastvalue' => $etudiant
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $ine = $request->searchIne ?? null;
        if($ine) {
            $query = Etudiant::query()->orderBy('created_at', 'desc');
                $query->where('ine', $ine);
            $etudiants = $query->get();
            $inscription = new Inscription();
            foreach ($etudiants as $etudiant) {
                return view("backoffice/pages/inscription/form",[
                    'etudiant' => $etudiant,
                    'inscription'=> $inscription,
                    'promotions' => Promotion::all(),
                    'niveaux' => Niveau::all(),
                    'programmes'=> Programme::all(),
                    'sessions'=> Session::orderBy('created_at','desc')->paginate(10),
                    'inputIne' => $ine
                ]);
            }

        }
        $inscription = new Inscription();
        $etudiant = new Etudiant();
        return view('backoffice.pages.inscription.form',[
            'inscription'=> $inscription,
            'etudiant' => $etudiant,
            'promotions' => Promotion::all(),
            'niveaux'=> Niveau::all(),
            'programmes'=> Programme::all(),
            'sessions'=> Session::orderBy('created_at','desc')->paginate(1),
            'inputIne' => $ine
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InscriptionRequest $request)
    {
        try {
            Inscription::create($request->validated());

            $etudiantId = $request->input('etudiant_id');
            $etudiant = Etudiant::find($etudiantId);
    
            $photo = $request->file('photo');
            if ($photo !== null && !$photo->getError()) {
                if ($etudiant && $etudiant->photo) {
                    Storage::disk('public')->delete($etudiant->photo);
                }
                $nouveau_nom= $photo->getClientOriginalName();
                $photoPath = $photo->storeAs('etudiants/etudiant', $nouveau_nom, 'public');
                if ($etudiant) {
                    $etudiant->update(['photo' => $photoPath]);
                }
            }
    
            // Vérifier si l'étudiant existe
            if ($etudiant) {
                $etudiant->update([
                    'telephone' => $request->input('telephone'),
                    'email' => $request->input('email'),
                    'nom_tuteur' => $request->input('nom_tuteur'),
                    'telephone_tuteur' => $request->input('telephone_tuteur'),
                    'adresse' => $request->input('adresse'),
                ]);
            }
    
            return redirect()->route('admin.inscription.index')->with('success', 'Inscription effectuée avec succès !');
        } catch (\Exception $e) {
            // Gérer l'exception ici
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la création de l\'inscription. Veuillez réessayer.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inscription $inscription)
    {
        $etudiant = $inscription->etudiant;
        return view('backoffice.pages.inscription.form',[
            'etudiant' => $etudiant,
            'inscription'=> $inscription,
            'promotions' => Promotion::all(),
            'niveaux'=> Niveau::all(),
            'programmes'=> Programme::all(),
            'sessions'=> Session::orderBy('created_at','desc')->paginate(1),
            'inputIne' => null
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InscriptionRequest $request, Inscription $inscription)
    {
        $data = $request->validated();
        
        try {
            $inscription->update($data);

            $etudiantId = $request->input('etudiant_id');
            $etudiant = Etudiant::find($etudiantId);
    
            $photo = $request->file('photo');
            if ($photo !== null && !$photo->getError()) {
                if ($etudiant && $etudiant->photo) {
                    Storage::disk('public')->delete($etudiant->photo);
                }
                $nouveau_nom= $photo->getClientOriginalName();
                $photoPath = $photo->storeAs('etudiants/etudiant', $nouveau_nom, 'public');
                if ($etudiant) {
                    $etudiant->update(['photo' => $photoPath]);
                }
            }
    
            // Vérifier si l'étudiant existe
            if ($etudiant) {
                $etudiant->update([
                    'telephone' => $request->input('telephone'),
                    'email' => $request->input('email'),
                    'nom_tuteur' => $request->input('nom_tuteur'),
                    'telephone_tuteur' => $request->input('telephone_tuteur'),
                    'adresse' => $request->input('adresse'),
                ]);
            }
    
            return redirect()->route('admin.inscription.index')->with('success', 'Modification effectuee avec succes !!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la création de l\'inscription. Veuillez réessayer.');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inscription $inscription)
    {
    //    if ($inscription->photo) {
    //         Storage::disk('public')->delete($inscription->photo);
    //    }
       $inscription->delete();
       return redirect()->route('admin.inscription.index')->with('success','Suppression effectuee avec succes !!');
    }
}
