<?php

namespace App\Livewire\Scolarite;

use App\Models\Etudiant;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateEtudiant extends Component
{
    use WithFileUploads;


    /* les propriétés de ma table etudiant (pour cabler les champs de mon formulaire */   
    public $nom;
    public $prenom;
    public $telephone;
    public $email;
    public $photo;
    public $pv;
    public $ine;
    public $session;
    public $profil;
    public $centre;
    public $ecole_origine;
    public $date_naissance;
    public $lieu_naissance;
    public $pere;
    public $mere;
    public $programme;
    public $nom_tuteur;
    public $telephone_tuteur;
    public $adresse;
    public $diplome;
    public $releve_notes;
    public $certificat_nationalite;
    public $certificat_medical;
    public $extrait_naissance;
    
    /**
     * rules : mes règles de validation
     *
     * @var array
     */
    protected $rules = [
        'nom' => ['required', 'string', 'min:2'],
        'prenom' => ['required', 'string', 'min:2'],
        'telephone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'between:9,18', 'unique:etudiants'],
        'email' => ['required', 'email', 'unique:etudiants'],
        'pv' => ['required', 'integer', 'unique:etudiants'],
        'ine' => ['required', 'string', 'min:14', 'max:20', 'unique:etudiants'],
        'session' => ['required', 'string'],
        'profil' => ['required', 'string', 'min:2'],
        'centre' => ['required', 'string', 'min:2'],
        'ecole_origine' => ['required', 'string'],
        'date_naissance' => ['required', 'date'],
        'lieu_naissance' => ['required', 'string', 'min:2'],
        'pere' => ['required', 'string', 'min:2'],
        'mere' => ['required', 'string', 'min:2'],
        'programme' => ['required', 'string', 'min:2'],
        'nom_tuteur' => ['string', 'min:2'],
        'telephone_tuteur' => ['regex:/^([0-9\s\-\+\(\)]*)$/', 'between:9,18', 'unique:etudiants'],
        'adresse' => ['string', 'min:2'],
        'diplome' => ['required', 'mimes:jpeg,png,jpg,gif,svg,ico,pdf'],
        'releve_notes' => ['required', 'mimes:jpg,jpeg,png,gif,svg,ico,pdf'],
        'certificat_nationalite' => ['required', 'mimes:jpg,jpeg,svg,png,gif,ico,pdf'],
        'certificat_medical' => ['required', 'mimes:jpg,jpeg,png,svg,gif,ico,pdf'],
        'extrait_naissance' => ['required', 'mimes:jpg,jpeg,png,gif,svg,ico,pdf'],
        'photo' => ['required', 'image', 'mimes:jpg,jpeg,png,gif,svg', 'max:1024'],
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
     * save : la méthode qui se charge d'enrégistrer un nouvel etudiant
     *
     * @return void
     */
    public function save()
    {
        $data = $this->validate();
        if ($this->photo) {
            $nouveau_nom = $this->photo->getClientOriginalName();
            $data['photo'] = $this->photo->storeAs('etudiants/etudiant', $nouveau_nom, 'public');
        }
        if ($this->diplome) {
            $nouveau_nom = $this->diplome->getClientOriginalName();
            $data['diplome'] = $this->diplome->storeAs('etudiants/diplome', $nouveau_nom, 'public');
        }
        if ($this->releve_notes) {
            $nouveau_nom = $this->releve_notes->getClientOriginalName();
            $data['releve_notes'] = $this->releve_notes->storeAs('etudiants/releve_notes', $nouveau_nom, 'public');
        }
        if ($this->extrait_naissance) {
            $nouveau_nom = $this->extrait_naissance->getClientOriginalName();
            $data['extrait_naissance'] = $this->extrait_naissance->storeAs('etudiants/extrait_naissance', $nouveau_nom, 'public');
        }
        if ($this->certificat_nationalite) {
            $nouveau_nom = $this->certificat_nationalite->getClientOriginalName();
            $data['certificat_nationalite'] = $this->certificat_nationalite->storeAs('etudiants/certificat_nationalite', $nouveau_nom, 'public');
        }
        if ($this->certificat_medical) {
            $nouveau_nom = $this->certificat_medical->getClientOriginalName();
            $data['certificat_medical'] = $this->certificat_medical->storeAs('etudiants/certificat_medical', $nouveau_nom, 'public');
        }
        Etudiant::create($data);
        $this->reset();
        session()->flash('success', 'Ajout effectuée avec succès!');
        return redirect()->route('scolarite.etudiant.index');
    }

    #[Layout("components.layouts.scolarite")]
    public function render()
    { 
         return view('livewire.scolarite.create-etudiant');
    }
}