<?php

namespace App\Livewire\Departements;

use App\Models\Enseignant;
use App\Models\Enseigner;
use App\Models\Matiere;
use App\Models\Programme;
use App\Models\Promotion;
use App\Models\Semestre;
use Livewire\Attributes\Layout;
use Livewire\Component;

class GiProgrammeCoursTables extends Component
{
    public $semestre = 0;
    public $searchProgramme = 0;
    public $promotion = 0;
    public $addline = false;
    public $editingId;

    public $enseignant_id;
    public $matiere_id;
    public $promotion_id;
    public $programme_id;
    public $semestre_id;

    protected $rules = [
        'matiere_id' => ['required'],
        'enseignant_id' => ['required'],
        'programme_id' => ['required'],
        'promotion_id' => ['required'],
        'semestre_id' => ['required'],
    ];

    public function toggleForm()
    {
        if ($this->addline) {
            return $this->addline = false;
        }
        return $this->addline = true;
    }

    public function edit(Enseigner $enseigner)
    {
        // dd($enseigner);
        $this->editingId = $enseigner->id;
        $this->enseignant_id = $enseigner->enseignant_id;
        $this->matiere_id = $enseigner->matiere_id;
        $this->promotion_id = $enseigner->promotion_id;
        $this->programme_id = $enseigner->programme_id;
        $this->semestre_id = $enseigner->semestre_id;
    }

    public function update()
    {
        $data = $this->validate();
        $enseigner = Enseigner::find($this->editingId);
        $enseigner->update($data);

        $this->cancel();
        session()->flash('success', 'Modification effectuée avec succès!');
    }

    public function cancel()
    {
        $this->reset('editingId');
    }

    public function delete(Enseigner $enseigner)
    {
        $enseigner->delete();
        session()->flash('success', 'Suppression effectuée avec succès!');
    }

    public function save()
    {
        $data = $this->validate();
        Enseigner::create($data);
        $this->reset(
            'enseignant_id',
            'matiere_id',
            'promotion_id',
            'programme_id',
            'semestre_id',
        );

        session()->flash('success', 'Ajout effectuée avec succès!');
    }

    public function clearStatus()
    {
        $this->resetErrorBag();
    }

    #[Layout("components.layouts.departement")]
    public function render()
    {
        $query = Enseigner::query()->orderBy('created_at', 'desc');

        // dd($query);
        if ($this->searchProgramme !== 0) {
            $query->where('programme_id', $this->searchProgramme);
        }

        if ($this->promotion !== 0) {
            $query->where('promotion_id', $this->promotion);
        }

        if ($this->semestre !== 0) {
            $query->where('semestre_id', $this->semestre);
        }

        $enseigners = $query->paginate(10);


        $matieres = Matiere::query()
            ->when($this->searchProgramme !== 0, function ($query) {
                $query->whereHas('programme', function ($subquery) {
                    $subquery->where('departement_id', 1);
                });
            })
            ->orderBy('created_at', 'asc') // Tri par ordre ascendant
            ->get();

        return view('livewire.departements.gi-programme-cours-tables', [
            'enseigners' => $enseigners,
            'matieres' => $matieres,
            'enseignants' => Enseignant::all(),
            'promotions' => Promotion::all(),
            'semestres' => Semestre::all(),
            'programmes' => Programme::all()
        ]);
    }

}
