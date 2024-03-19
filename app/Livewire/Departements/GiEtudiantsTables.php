<?php

namespace App\Livewire\Departements;

use App\Models\Etudiant;
use App\Models\Niveau;
use App\Models\Programme;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Livewire\Attributes\Layout;
use Livewire\Component;

class GiEtudiantsTables extends Component
{
    public string $session = '';
    public $niveau = 0;
    public $searchProgramme = 0;
    public $search = '';
    

    public function generatePDF()
    {
        $etudiant = Etudiant::query()->orderBy("created_at","desc");
        $etudiant->orWhereHas('programme', function ($etudiant){
            $etudiant->where('departement_id', 1);
        });

        //2- On filtre les etudiants du departement Génie Informatique par programme donné
        if ($this->searchProgramme !== 0){
            $etudiant->where('programme_id', $this->searchProgramme);
        }
        //3- On filtre les etudiants du departement Génie Informatique par session donnée
        if ($this->session !== '') {
            $etudiant->WhereHas('session', function ($etudiant){
                $etudiant->where('session', $this->session);
            }); 
        }
        //4- On filtre les etudiants du departement Génie Informatique par niveau donné
        if ($this->niveau !== 0) {
            $etudiant->where('niveau_id', $this->niveau);
        }

        $etudiants = $etudiant->get();
        $pdf = PDF::loadView('livewire.pdf.liste-etudiant', compact('etudiants'));
        return response()->streamDownload(function () use($pdf) {
            echo  $pdf->stream();
        }, 'listeGenieInfo.pdf');

    }

    #[Layout("components.layouts.departement")]

    public function render()
    {
        // 1- pour un debut je retourne la liste des etudiants inscrits au departement Génie Informatique
        $etudiant = Etudiant::query()->orderBy("created_at","desc");
        // $etudiant->orWhereHas('programme', function ($etudiant){
        //     $etudiant->where('departement_id', 1);
        // });

        //2- On filtre les etudiants du departement Génie Informatique par programme donné
        if ($this->searchProgramme !== 0){
            $etudiant->where('programme_id', $this->searchProgramme);
        }

        //3- On filtre les etudiants du departement Génie Informatique par niveau donné
        if ($this->session !== '') {
            $etudiant->where(function ($query) {
                $query->where('session', 'like', '%'.$this->session. '%');
            });
        }

        // Ajoutez cette condition pour la recherche globale
        if ($this->search !== '') {
            $etudiant->where(function ($query) {
                $query->where('nom', 'like', '%' . $this->search . '%')
                ->orWhere('prenom', 'like', '%' . $this->search . '%')
                ->orWhere('telephone', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->orWhere('programme', 'like', '%' . $this->search . '%')
                ->orWhere('ine', 'like', '%' . $this->search . '%');
            });
        }

        $etudiants = $etudiant->paginate(25);

        return view('livewire.departements.gi-etudiants-tables',[
            'etudiants' => $etudiants,
            'niveaux' => Niveau::all(),
            'programmes' => Programme::all(),
        ]);
        
    }
}
