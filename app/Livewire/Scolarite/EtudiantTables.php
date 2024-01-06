<?php

namespace App\Livewire\Scolarite;

use App\Imports\EtudiantImport;
use App\Models\Etudiant;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class EtudiantTables extends Component
{
    use WithFileUploads;

    /**
     * searchIne: la propriété charger de recuperer la valeur de recherche de l'etudiant
     * par son ine
     *
     * @var string
     */
    public $searchIne = '';
    
    /**
     * fichier: la propriété charger de stocker le fichier à importer
     *
     * @var mixed
     */
    public $fichier;
    
    /**
     * rules: Règles de validation du fichier à importer
     *
     * @var array
     */
    protected $rules = [
        'fichier' => ['file']
    ];



   /**
     * clearStatus: elle se charge de reinitialiser les erreurs de validation
     * dans les champs du formulaire, elle est appélée au clic de l'un des champs
     * et son appel déclenche le reset des erreurs de validation
     *
     * @return void
     */
    public function clearStatus()
    {
        $this->resetErrorBag();
    }
    
    /**
     * importer: la méthode d'import de fichier
     *
     * @return void
     */
    public function importer() {
        $this->validate();
        try {
            if($this->fichier) {
                Excel::import(new EtudiantImport, $this->fichier);
                $this->reset('fichier');
                session()->flash('success', 'Import effectué avec succès!');

            }
        } catch (\Throwable $th) {
            session()->flash('danger', "Echec de l'import !");
        }

    }
        
    /**
     * delete: la méthode de delete d'un etudiant
     *
     * @param  Etudiant $etudiant
     * @return void
     */
    public function delete(Etudiant $etudiant) {
        $etudiant->delete();
        session()->flash('success', 'Suppression effectuée avec succès!');
    }

    /**
     * render : la méthode render qui se charge de rendre le composant etudiant-tables
     * avec les etudiants ou un etudiant recherché.
     *
     * @return view
     */
    #[Layout("components.layouts.scolarite")]    
    public function render()
    {
        return view('livewire.scolarite.etudiant-tables',[
            "etudiants"=> Etudiant::where('ine', 'LIKE', "%{$this->searchIne}%")->paginate(10),
        ]);
    }

}