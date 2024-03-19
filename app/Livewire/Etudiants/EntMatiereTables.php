<?php
    namespace App\Livewire\Etudiants;
    
    use App\Models\Matiere;
    use App\Models\Programme;
    use App\Models\Semestre;
    use Livewire\Attributes\Layout;
    use Livewire\Component;
    use Livewire\WithFileUploads;
    
    class EntMatiereTables extends Component
    {
        use WithFileUploads;
    
        public $semestre = 0;
        public $searchProgramme = 0;
        public $perPage = 25;
        public $currentPage = 1;
        public $afficherLicence1 = false;
        public $search = '';
    
        public $queryString = [
            'search' => ['except' => ''],
        ];
    
        #[Layout("components.layouts.etudiant")]
        public function render()
        {
            $matieres = Matiere::query()
                ->where("matiere", "LIKE", "%{$this->search}%")
                ->orderBy('created_at', 'asc');
    
            // pour selectionner un programme
            if ($this->searchProgramme !== 0) {
                $matieres->where('programme_id', $this->searchProgramme);
            }
    
            // un semestre
            if ($this->semestre !== 0) {
                $matieres->where('semestre_id', $this->semestre);
            }
    
            // Filtrer les matières pour Licence 1 (semestre 1 et 2)
            $matieresLicence1 = clone $matieres;
            $matieresLicence1->where(function ($query) {
                $query->where('semestre_id', 1)
                    ->orWhere('semestre_id', 2);
            });
    
            // Filtrer les matières pour Licence 2 (semestre 3 et 4)
            $matieresLicence2 = clone $matieres;
            $matieresLicence2->where(function ($query) {
                $query->where('semestre_id', 3)
                    ->orWhere('semestre_id', 4);
            });
    
            // Filtrer les matières pour Licence 3 (semestre 5 et 6)
            $matieresLicence3 = clone $matieres;
            $matieresLicence3->where(function ($query) {
                $query->where('semestre_id', 5)
                    ->orWhere('semestre_id', 6);
            });
    
            // Filtrer les matières pour Licence 4 (semestre 7 et 8)
            $matieresLicence4 = clone $matieres;
            $matieresLicence4->where(function ($query) {
                $query->where('semestre_id', 7)
                    ->orWhere('semestre_id', 8);
            });
    
            return view('livewire.etudiants.ent-matiere-tables', [
                'matieresLicence1' => $matieresLicence1->paginate(10),
                'matieresLicence2' => $matieresLicence2->paginate(10),
                'matieresLicence3' => $matieresLicence3->paginate(10),
                'matieresLicence4' => $matieresLicence4->paginate(10),
                'matieres' => $matieres,
                'semestres' => Semestre::all(),
                'programmes' => Programme::all(),
            ]);
        }
        // 
    
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
    
