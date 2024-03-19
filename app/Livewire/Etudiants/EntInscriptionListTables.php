<?php

namespace App\Livewire\Etudiants;

use Livewire\Attributes\Layout;
use Livewire\Component;

class EntInscriptionListTables extends Component
{
    #[Layout("components.layouts.etudiant")]
    public function render()
    {
        return view('livewire.etudiants.ent-inscription-list-tables');
    }
}
