<?php

namespace App\Livewire\Etudiants;

use App\Models\AnneeUniversitaire;
use App\Models\Etudiant;
use App\Models\Inscription;
use App\Models\Niveau;
use App\Models\Programme;
use App\Models\Promotion;
use App\Models\Session;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class EntInscriptionTables extends Component
{

    use WithFileUploads;

    /**
     * searchIne: la propriété charger de recuperer la valeur de recherche de l'ine
     * @var string
     */
    public $searchIne = '';

    /**
     * @var Etudiant
     */
    public Etudiant $etudiant;

    /* les propriétés de la table etudiant */
    public $nom;
    public $prenom;
    public $telephone;
    public $email;
    public $photo;
    public $pv;
    public $ine;
    public $date_naissance;
    public $lieu_naissance;
    public $nom_tuteur;
    public $telephone_tuteur;
    public $adresse;
    public $mere;
    public $pere;

    /* les propriétés de la table inscription */
    public $session_id;
    public $promotion_id;
    public $niveau_id;
    public $programme_id;
    public $etudiant_id;


    /**
     * rules : les règles de validations
     *
     * @return array
     */
    public function rules()
    {
        return [
            "etudiant_id" => ["required"],
            "promotion_id" => ["required"],
            "niveau_id" => ["required"],
            "session_id" => ["required"],
            "programme_id" => ["required"],
        ];
    }

    /**
     * init: à l'inscription d'un etudiant on le recherche d'abord par son ine,
     * ensuite on charge ses informations grâce à la méthode initialisation()
     * @return void
     */
    public function init()
    {
        $etudiants = Etudiant::where('ine', $this->searchIne)->get();
        foreach ($etudiants as $etudiant) {
            $this->initialisation($etudiant);
        }
    }

    /**
     * initialisation: reçoit l'etudiant recherché ensuite passe cet etudiant 
     * à la propriété $etudiant et ses autres informations aux autres propriétés
     * car c'est son ces propriétés qui sont liés aux champs de mon formulaire
     * @param  Etudiant $etudiant
     * @return void
     */
    public function initialisation(Etudiant $etudiant)
    {
        $this->etudiant = $etudiant;

        $this->etudiant_id = $etudiant->id;
        $this->nom = $etudiant->nom;
        $this->prenom = $etudiant->prenom;
        $this->telephone = $etudiant->telephone;
        $this->email = $etudiant->email;
        $this->photo = $etudiant->photo;
        $this->pv = $etudiant->pv;
        $this->ine = $etudiant->ine;
        $this->pere = $etudiant->pere;
        $this->mere = $etudiant->mere;
        $this->date_naissance = $etudiant->date_naissance;
        $this->lieu_naissance = $etudiant->lieu_naissance;
        $this->photo = $etudiant->photo;
        $this->adresse = $etudiant->adresse;
        $this->nom_tuteur = $etudiant->nom_tuteur;
        $this->telephone_tuteur = $etudiant->telephone_tuteur;
    }

    /**
     * store: enrégistrer une inscription
     * @return void
     */
    public function store()
    {
        Inscription::create($this->validate());
        /*
        * vérifier si une nouvelle photo est chargée, car si c'est le cas la propriété $this->photo
        * sera de type UploadedFile si c'est le contraire il sera de type string 
        */
        if (!is_string($this->photo)) {
            if ($this->etudiant && $this->etudiant->photo) {
                Storage::disk('public')->delete($this->etudiant->photo);
            }

            $nouveau_nom = $this->photo->getClientOriginalName();
            $photoPath = $this->photo->storeAs('etudiants/etudiant', $nouveau_nom, 'public');
            if ($this->etudiant) {
                $this->etudiant->update(['photo' => $photoPath]);
            }
        }

        // Vérifier si l'étudiant existe
        if ($this->etudiant) {
            $this->etudiant->update([
                'telephone' => $this->telephone,
                'email' => $this->email,
                'nom_tuteur' => $this->nom_tuteur,
                'telephone_tuteur' => $this->telephone_tuteur,
                'adresse' => $this->adresse
            ]);
        }

        $this->reset();
        session()->flash('success', 'Inscription ou Reinscription effectuée avec succès!');
        return redirect()->route('etudiant.list-reinscrit');
    }


    // methode cancel
    public function cancel()
    {
        $this->reset(
            'nom',
            'prenom',
            'telephone',
            'email',
            'pv',
            'ine',
            'ecole_origine',
            'date_naissance',
            'lieu_naissance',
            'pere',
            'mere',
            'programme',
            'nom_tuteur',
            'telephone_tuteur',
            'adresse',
            'diplome',
            'releve_notes',
            'certificat_nationalite',
            'certificat_medical',
            'extrait_naissance',
            'photo',
        );
        return redirect()->route('etudiant.inscription');
    }

    /**
     * render: cette méthode se charge de rendre le composant create-inscription,
     * ce composant s'etend du composant etudiant
     *
     * @return view
     */
    #[Layout("components.layouts.etudiant")]
    public function render()
    {
        return view('livewire.etudiants.ent-inscription-tables', [
            'promotions' => Promotion::paginate(4),
            'niveaux' => Niveau::all(),
            'programmes' => Programme::all(),
            'annee_universitaires' => AnneeUniversitaire::orderBy('created_at', 'desc')->paginate(1),
        ]);
    }
}

