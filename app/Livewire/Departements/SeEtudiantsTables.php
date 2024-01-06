<?php

namespace App\Livewire\Departements;

use App\Models\Inscription;
use App\Models\Niveau;
use App\Models\Programme;
use Livewire\Attributes\Layout;
use Livewire\Component;

class SeEtudiantsTables extends Component
{
    public string $session = '';
    public $niveau = 0;
    public $searchProgramme = 0;

    #[Layout("components.layouts.departement")]
    public function render()
    {
        //1- pour un debut je retourne la liste des etudiants inscrits au departement Science des Energies
        $inscription = Inscription::query()->orderBy("created_at","desc");
        $inscription->orWhereHas('programme', function($inscription){
            $inscription->where('departement_id', 3);
        });
        //2- On filtre les etudiants du departement Science des Energies par programme donné
        if ($this->searchProgramme !== 0){
            $inscription->where('programme_id', $this->searchProgramme);
        }
        //3- On filtre les etudiants du departement Science des Energies par session donnée
        if ($this->session !== '') {
            $inscription->WhereHas('session', function ($inscription){
                $inscription->where('session', $this->session);
            });
        }
        //3- On filtre les etudiants du departement Science des Energies par niveau donné
        if ($this->niveau !== 0) {
            $inscription->where('niveau_id', $this->niveau);
        }
        /* Si les trois conditions sont reunies: On aura la liste des etudiants du departement
        Science des Energies qui font le programme Science des Energies et le niveau tel(ex:Licence 1)
        et la session (ex:2023-2024) */
        return view('livewire.departements.se-etudiants-tables',[
            'etudiants' => $inscription->get(),
            'niveaux' => Niveau::all(),
            'programmes' => Programme::where('departement_id',3)->get(),
        ]);
    }
}
