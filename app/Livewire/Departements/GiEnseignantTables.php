<?php

namespace App\Livewire\Departements;

use App\Models\Departement;
use App\Models\Enseignant;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class GiEnseigantsTables extends Component
{
    use WithPagination;

    public $search = '';
    public $searchDepartement = 0;
    public $perPage = 25;
    public $currentPage = 1;

    #[Layout('components.layouts.departement')]
    public function render()
    {
        $enseignants = Enseignant::query()->orderBy('created_at', 'asc')
            ->where("nom", "LIKE", "%{$this->search}%");
        // $enseignants = Enseignant::ens$enseignants()
        //     ->orderBy('created_at', 'desc')
        //     ->where(function ($enseignants) {
        //         $enseignants->where('nom', 'like', '%' . $this->searchTeacher . '%')
        //             ->orWhere('prenom', 'like', '%' . $this->searchTeacher . '%')
        //             ->orWhere('email', 'like', '%' . $this->searchTeacher . '%')
        //             ->orWhere('matricule', 'like', '%' . $this->searchTeacher . '%');
        //     });

        // pour sélectionner un département
        if ($this->searchDepartement !== 0) {
            $enseignants->where('departement_id', $this->searchDepartement);
        }

        $enseignants = $enseignants->paginate($this->perPage, ['*'], 'page', $this->currentPage);
        return view('livewire.departements.gi-enseignants-tables', [
            'enseignants' => $enseignants,
            'departements' => Departement::all(),
        ]);
    }

    // page suivante
    public function nextPage()
    {
        $this->currentPage++;
    }

    // page precedente
    public function previousPage()
    {
        $this->currentPage = max(1, $this->currentPage - 1);
    }

    public function updatedSearchDepartement()
    {
        $this->currentPage = 1;
    }
}
