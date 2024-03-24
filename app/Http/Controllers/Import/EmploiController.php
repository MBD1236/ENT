<?php

namespace App\Http\Controllers\Import;

use App\Http\Controllers\Controller;
use App\Models\AnneeUniversitaire;
use App\Models\EmploiTemps;
use App\Models\Enseignant;
use App\Models\Matiere;
use App\Models\Promotion;
use App\Models\Semestre;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EmploiController extends Controller
{
    public function index()
    {
       return view('livewire.departements.gi-emplois-tables');
    }

    // l'import de l'emploi de temps
    public function upload(Request $request)
    {
        $request->validate([
            'fichier' => 'required|mimes:xlsx,xls',
        ]);

        $path = $request->file('fichier')->getRealPath();
        $data = Excel::toArray(null, $path); 

        if (!empty($data) && isset($data[0]) && count($data[0]) > 0) {
            $firstSheetData = $data[0]; 

            foreach ($firstSheetData as $row) {
                try {
                    $enseignant = Enseignant::firstOrCreate(['nom' => $row->enseignant]);
                    $programme = Promotion::firstOrCreate(['programme' => $row->programme]);
                    $semestre = Semestre::firstOrCreate(['semestre' => $row->semestre]);
                    $promotion = Promotion::firstOrCreate(['promotion' => $row->promotion]);
                    $annee_universitaire = AnneeUniversitaire::firstOrCreate(['annee_universitaire' => $row->annee_universitaire]);

                    // verifier si la matiere existe
                    $matiere = Matiere::where('matiere', $row->matiere)->first();
                    if (!$matiere) {
                        throw new \Exception("La matière '" . $row->matiere . "' n'existe pas dans la base de données !");
                    }

                    $emploi = new EmploiTemps();
                    $emploi->enseignant_id = $enseignant->id;
                    $emploi->matiere_id = $matiere->id; 
                    $emploi->programme_id = $programme->id;
                    $emploi->promotion_id = $promotion->id;
                    $emploi->semestre_id = $semestre->id;
                    $emploi->annee_universitaire_id = $annee_universitaire->id;
                    $emploi->jour = $row->jour;
                    $emploi->horaire = $row->horaire;
                    $emploi->salle = $row->salle;
                    $emploi->emploi = $row->emploi;
                    dd($emploi);
                    $emploi->save();
                } catch (\Exception $e) {
                    session()->flash('error', "Erreur lors de l'importation : " . $e->getMessage());
                    return redirect()->back();
                }
            }
            return redirect()->route('genieinfo.emploiindex')->with('success', 'Emploi importé avec succès !');
        } else {
            session()->flash('error', "Le fichier Excel est vide ou mal formaté !");
            return redirect()->back();
        }
    }
}
