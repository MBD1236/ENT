<?php

namespace App\Livewire\Departements;

use App\Http\Requests\ModuleEtudiant\EtudiantRequest;
use App\Models\EmploiTemps;
use App\Models\Enseignant;
use App\Models\Matiere;
use App\Models\Niveau;
use App\Models\Programme;
use App\Models\Promotion;
use App\Models\Semestre;
use App\Models\annee_universitaire;
use App\Models\AnneeUniversitaire;
use Illuminate\Http\Request;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class GiEmploisTables extends Component
{
    public $semestre = 0;
    public $annee_universitaire = 0;
    public $searchProgramme = 0;
    public $promotion = 0;
    public $addline = false;
    public $editingId;

    public $jour;
    public $horaire;
    public $matiere_id;
    public $enseignant_id;
    public $programme_id;
    public $promotion_id;
    public $semestre_id;
    public $annee_universitaire_id;
    public $salle;


    protected $rules = [
        'jour' => ['required','string'],
        'horaire' => ['required','string'],
        'matiere_id' => ['required'],
        'enseignant_id' => ['required'],
        'programme_id' => ['required'],
        'promotion_id' => ['required'],
        'semestre_id' => ['required'],
        'annee_universitaire_id' => ['required'],
        'salle' => ['required','string'],
    ];

    public function toggleForm() {
        if($this->addline) {
           return $this->addline = false;
        }
        return $this->addline = true;
    }

    public function edit(EmploiTemps $emploi) {
        $this->editingId = $emploi->id;
        $this->jour = $emploi->jour;
        $this->horaire = $emploi->horaire;
        $this->matiere_id = $emploi->matiere_id;
        $this->enseignant_id = $emploi->enseignant_id;
        $this->programme_id = $emploi->programme_id;
        $this->promotion_id = $emploi->promotion_id;
        $this->semestre_id = $emploi->semestre_id;
        $this->annee_universitaire_id = $emploi->annee_universitaire_id;
        $this->salle = $emploi->salle;
    }

    public function update() {
        $data = $this->validate();
        $emploi = EmploiTemps::find($this->editingId);
        $emploi->update($data);

        $this->cancel();
        session()->flash('success', 'Modification effectuée avec succès!');

    }

    public function cancel() {
        $this->reset('editingId');
    }
    
    public function delete(EmploiTemps $emploi) {
        $emploi->delete();
        session()->flash('success', 'Suppression effectuée avec succès!');
    }

    public function save() {
        $data = $this->validate();
        EmploiTemps::create($data);
        $this->reset(
            'jour','horaire','salle','matiere_id','enseignant_id',
            'annee_universitaire_id', 'promotion_id','programme_id',
        );

        session()->flash('success', 'Ajout effectuée avec succès!');
    }

    public function clearStatus() {
        $this->resetErrorBag();
    }

    #[Layout("components.layouts.departement")]
    public function render()
    {
        // $query = EmploiTemps::all();
       
        $query = EmploiTemps::query()->orderBy('created_at', 'desc');

        if ($this->searchProgramme !== 0) {
            $query->where('programme_id', $this->searchProgramme);
        }

        if ($this->promotion !== 0) {
            $query->where('promotion_id', $this->promotion);
        }

        if ($this->semestre !== 0) {
            $query->where('semestre_id', $this->semestre);
        }

        // pour filtrer par annee_universitaire
        if ($this->annee_universitaire !== 0) {
            $query->where("annee_universitaire_id", $this->annee_universitaire);
        }

        $emplois = $query->paginate(10);


        $matieres = Matiere::query()
            ->when($this->searchProgramme !== 0, function ($query) {
                $query->whereHas('programme', function ($subquery) {
                    $subquery->where('departement_id', 1);
                });
            })
            ->orderBy('created_at', 'asc') // Tri par ordre ascendant
            ->get();

        return view('livewire.departements.gi-emplois-tables', [
            'emplois' => $emplois,
            'matieres' => $matieres,
            'enseignants' => Enseignant::all(),
            'semestres' => Semestre::all(),
            'programmes' => Programme::all(),
            'promotions' => Promotion::orderBy('created_at', 'desc')->paginate(5),
            'annee_universitaires' => AnneeUniversitaire::orderBy('created_at', 'desc')->paginate(5),
        ]);
    }
}
