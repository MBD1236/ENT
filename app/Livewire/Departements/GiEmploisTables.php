<?php

namespace App\Livewire\Departements;

use App\Http\Requests\ModuleEtudiant\EtudiantRequest;
use App\Models\Departement;
use App\Models\EmploiTemps;
use App\Models\Enseignant;
use App\Models\Matiere;
use App\Models\Niveau;
use App\Models\Programme;
use App\Models\Promotion;
use App\Models\Semestre;
use App\Models\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;

class GiEmploisTables extends Component
{
    public $niveau = 0;
    public $session = 0;
    public $searchProgramme = 0;
    public $addline = false;
    public $editingId;

    public $horaire;
    public $jour;
    public $matiere_id;
    public $enseignant_id;
    public $programme_id;
    public $niveau_id;
    public $promotion_id;
    public $semestre_id;
    public $session_id;
    public $salle;


    protected $rules = [
        'horaire' => ['required','string'],
        'jour' => ['required','string'],
        'matiere_id' => ['required'],
        'enseignant_id' => ['required'],
        'programme_id' => ['required'],
        'niveau_id' => ['required'],
        'promotion_id' => ['required'],
        'semestre_id' => ['required'],
        'session_id' => ['required'],
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
        $this->horaire = $emploi->horaire;
        $this->jour = $emploi->jour;
        $this->matiere_id = $emploi->matiere_id;
        $this->enseignant_id = $emploi->enseignant_id;
        $this->programme_id = $emploi->programme_id;
        $this->niveau_id = $emploi->niveau_id;
        $this->promotion_id = $emploi->promotion_id;
        $this->semestre_id = $emploi->semestre_id;
        $this->session_id = $emploi->session_id;
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
        $this->reset('horaire','jour','salle','matiere_id','enseignant_id','session_id',
            'promotion_id','niveau_id','programme_id',);

        session()->flash('success', 'Ajout effectuée avec succès!');
    }

    public function clearStatus() {
        $this->resetErrorBag();
    }

    #[Layout("components.layouts.departement")]
    public function render()
    {

        $query = EmploiTemps::query()->orderBy('created_at', 'asc');
        $query->orWhereHas('programme', function ($query) {
            $query->where('departement_id', 1);
        });

        /* je recupère les matieres ensuite à travers "orWhereHas" je recupère la rélation "departement"
        qui lie la matiere au departement, ensuite recuperer le departement Génie Informatique */
        $matiere = Matiere::query()->orderBy('created_at', 'asc');
        $matiere->orWhereHas('programme', function ($matiere) {
            $matiere->where('departement_id', 1);
        });
        //2- On filtre les etudiants du departement Génie Informatique par programme donné
        if ($this->searchProgramme !== 0){
            $query->where('programme_id', $this->searchProgramme);
        }
        if($this->niveau !== 0) {
            $query->where("niveau_id", $this->niveau);
        }
        if($this->session !== 0) {
            $query->where("session_id", $this->session);
        }

        return view('livewire.departements.gi-emplois-tables',[
            'emplois' => $query->paginate(10),
            'matieres' => $matiere->get(),
            'enseignants' => Enseignant::all(),
            'niveaux' => Niveau::all(),
            'promotions' => Promotion::all(),
            'semestres' => Semestre::all(),
            'sessions' => Session::orderBy('created_at', 'desc')->paginate(1),
            'programmes' => Programme::where('departement_id',1)->get(),
        ]);
    }
}
