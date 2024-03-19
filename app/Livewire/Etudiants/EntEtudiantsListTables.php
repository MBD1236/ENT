<?php

namespace App\Livewire\Etudiants;

use Livewire\Attributes\Layout;
use Livewire\Component;

class EntEtudiantsListTables extends Component
{
    #[Layout('Components.layouts.etudiant')]
    public function render()
    {
        return view('livewire.etudiants.ent-etudiants-list-tables');
    }
}