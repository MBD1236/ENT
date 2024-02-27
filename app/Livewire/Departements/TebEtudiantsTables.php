<?php

namespace App\Livewire\Departements;

use App\Models\Inscription;
use App\Models\Niveau;
use App\Models\Programme;
use Livewire\Attributes\Layout;
use Livewire\Component;

class TebEtudiantsTables extends Component
{
    public string $annee_universitaire = '';
    public $niveau = 0;
    public $searchProgramme = 0;

    
    #[Layout("components.layouts.departement")]
    public function render()
    {
        // 1- pour un debut je retourne la liste des etudiants inscrits au departement TEB
    $inscription = Inscription::query()->orderBy("created_at","desc");
    $inscription->orWhereHas('programme', function ($inscription){
        $inscription->where('departement_id', 5);
    });
    //2- On filtre les etudiants du departement TEB par programme donné
    if ($this->searchProgramme !== 0){
        $inscription->where('programme_id', $this->searchProgramme);
    }
    //3- On filtre les etudiants du departement TEB par annee_universitaire donnée
    if ($this->annee_universitaire !== '') {
        $inscription->WhereHas('annee_universitaire', function ($inscription){
            $inscription->where('annee_universitaire', $this->annee_universitaire);
        }); 
    }
    //3- On filtre les etudiants du departement TEB par niveau donné
    if ($this->niveau !== 0) {
        $inscription->where('niveau_id', $this->niveau);
    }
    /* Si les trois conditions sont reunies: On aura la liste des etudiants du departement
    TEB qui font le programme TEB et le niveau tel(ex:Licence 1)
    et la annee_universitaire (ex:2023-2024) */
        return view('livewire.departements.teb-etudiants-tables',[
            'etudiants' => $inscription->get(),
            'niveaux' => Niveau::all(),
            'programmes' => Programme::where('departement_id',5)->get(),
        ]);
    }
}
