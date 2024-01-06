<?php

namespace App\Livewire\Scolarite;

use App\Models\Inscription;
use Livewire\Attributes\Layout;
use Livewire\Component;

class InscriptionTables extends Component
{    
    /**
     * searchEtudiant: stocker l'ine ou la promotion de l'etudiant inscrit ou reinscrit 
     * à rechercher
     *
     * @var string
     */
    public $searchEtudiant = '';


    /**
     * delete: la méthode de suppression d'une inscription
     *
     * @param  Inscription $inscription
     * @return void
     */
    public function delete(Inscription $inscription) {
        $inscription->delete();
        session()->flash('success', 'Suppression effectuée avec succès!');
    }

    /**
     * render : la méthode render qui se charge de rendre le composant inscription-tables
     * avec les etudiants ou un etudiant recherché.
     *
     * @return view
     */
    #[Layout("components.layouts.scolarite")]
    public function render()
    {
        $query = Inscription::query()->orderBy('created_at','desc');
        if ($this->searchEtudiant !== '') {
                $query->where(function ($query)  {
                // Recherche de l'INE
                $query->orWhereHas('etudiant', function ($query)  {
                    $query->where('ine', 'LIKE', "%{$this->searchEtudiant}%");
                });
                // Recherche de promotion
                $query->orWhereHas('promotion', function ($query)  {
                    $query->where('promotion', 'LIKE', "%{$this->searchEtudiant}%");
                });

                // Recherche de session
                $query->orWhereHas('session', function ($query)  {
                    $query->where('session', 'LIKE', '%' . $this->searchEtudiant . '%');
                });

                // Recherche de programme
                $query->orWhereHas('programme', function ($query)  {
                    $query->where('nom', 'LIKE', "%{$this->searchEtudiant}%");
                });

                // Recherche de niveau
                $query->orWhereHas("niveau", function ($query)  {
                    $query->where("niveau", "LIKE", "%{$this->searchEtudiant}%");
                });
            });

        }
        return view('livewire.scolarite.inscription-tables',[
            'inscriptions' => $query->paginate(10),
        ]);
    }
}