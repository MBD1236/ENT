<?php

namespace App\Livewire\Departements;

use App\Models\Inscription;
use App\Models\Niveau;
use App\Models\Programme;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Attributes\Layout;
use Livewire\Component;

class GiInscriptionsTables extends Component
{
    public string $session = '';
    public $niveau = 0;
    public $searchProgramme = 0;
    public $search = '';

    public function generatePDF()
    {
        $inscription = Inscription::query()->orderBy("created_at", "desc");
        $inscription->orWhereHas('programme', function ($inscription) {
            $inscription->where('departement_id', 1);
        });

        //2- On filtre les etudiants du departement Génie Informatique par programme donné
        if ($this->searchProgramme !== 0) {
            $inscription->where('programme_id', $this->searchProgramme);
        }
        //3- On filtre les etudiants du departement Génie Informatique par session donnée
        if ($this->session !== '') {
            $inscription->WhereHas('session', function ($inscription) {
                $inscription->where('session', $this->session);
            });
        }
        //4- On filtre les etudiants du departement Génie Informatique par niveau donné
        if ($this->niveau !== 0) {
            $inscription->where('niveau_id', $this->niveau);
        }

        $inscriptions = $inscription->get();
        $pdf = PDF::loadView('livewire.pdf.liste-etudiant', compact('inscriptions'));
        return response()->streamDownload(function () use ($pdf) {
            echo  $pdf->stream();
        }, 'listeGenieInfo.pdf');
    }

    #[Layout("components.layouts.departement")]

    public function render()
    {
        // 1- pour un debut je retourne la liste des etudiants inscrits au departement Génie Informatique
        $inscription = Inscription::query()->orderBy("created_at", "desc");
        // $inscription->orWhereHas('programme', function ($inscription) {
        //     $inscription->where('departement_id', 1);
        // });

        //2- On filtre les etudiants du departement Génie Informatique par programme donné
        if ($this->searchProgramme !== 0) {
            $inscription->where('programme_id', $this->searchProgramme);
        }

        //3- On filtre les etudiants du departement Génie Informatique par session donnée
        if ($this->session !== '') {
            $inscription->where(function ($query) {
                $query->where('session_id', 'like', '%' . $this->session . '%');
            });
        }

        //4- On filtre les etudiants du departement Génie Informatique par niveau donné
        if ($this->niveau !== 0) {
            $inscription->where('niveau_id', $this->niveau);
        }

        // Ajoutez cette condition pour la recherche globale
        if ($this->search !== '') {
            $inscription->where(function ($query) {
                $query->where('nom', 'like', '%' . $this->search . '%')
                ->orWhere('prenom', 'like', '%' . $this->search . '%')
                ->orWhere('telephone', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->orWhere('programme', 'like', '%' . $this->search . '%')
                ->orWhere('ine', 'like',
                    '%' . $this->search . '%'
                );
            });
        }

        $inscriptions = $inscription->paginate(25);


        return view('livewire.departements.gi-inscriptions-tables', [
            'inscriptions' => $inscription->get(),
            'niveaux' => Niveau::all(),
            'programmes' => Programme::all(),
        ]);
    }
}

