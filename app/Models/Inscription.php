<?php

namespace App\Models;

use App\Models\Etudiant;
use App\Models\Niveau;
use App\Models\Promotion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;

    protected $fillable = [
        "etudiant_id",
        "programme_id",
        "promotion_id",
        "niveau_id",
        "annee_universitaire_id"
    ];

    public function etudiant() {
        return $this->belongsTo(Etudiant::class);
    }
    public function promotion() {
        return $this->belongsTo(Promotion::class);
    }
    public function niveau() {
        return $this->belongsTo(Niveau::class);
    }
    public function annee_universitaire() {
        return $this->belongsTo(AnneeUniversitaire::class);
    }
    public function programme() {
        return $this->belongsTo(Programme::class);
    }
}
