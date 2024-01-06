<?php

namespace App\Livewire\Departements;

use App\Models\Matiere;
use App\Models\Programme;
use App\Models\Semestre;
use Livewire\Attributes\Layout;
use Livewire\Component;

class SeMatieresTables extends Component
{
    public $semestre = 0;
    public $searchProgramme = 0;

    #[Layout("components.layouts.departement")]
    public function render()
    {
        $matieres = Matiere::query()->orderBy('semestre_id', 'asc');
        $matieres->orWhereHas('programme', function ($matieres) {
            $matieres->where('departement_id', 3);
        });
        if ($this->searchProgramme !== 0) {
            $matieres->where('programme_id', $this->semestre);
        }
        if ($this->semestre !== 0) {
            $matieres->where('semestre_id', $this->semestre);
        }
        return view('livewire.departements.se-matieres-tables',[
            'matieres' => $matieres->paginate(10),
            'semestres' => Semestre::all(),
            'programmes' => Programme::where('departement_id',3)->get(),
        ]);
    }
}
