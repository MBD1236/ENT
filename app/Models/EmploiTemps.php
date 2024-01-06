<?php

namespace App\Models;

use App\Models\Niveau;
use App\Models\Programme;
use App\Models\Promotion;
use App\Models\Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploiTemps extends Model
{
    use HasFactory;

    protected $fillable = [
        "horaire",
        "jour",
        "salle",
        "programme_id",
        "session_id",
        "promotion_id",
        "niveau_id",
        "enseignant_id",
        "matiere_id",
        "semestre_id"
    ];


    public function promotion() {
        return $this->belongsTo(Promotion::class);
    }
    public function niveau() {
        return $this->belongsTo(Niveau::class);
    }
    public function session() {
        return $this->belongsTo(Session::class);
    }
    public function programme() {
        return $this->belongsTo(Programme::class);
    }
    public function matiere() {
        return $this->belongsTo(Matiere::class);
    }
    public function enseignant() {
        return $this->belongsTo(Enseignant::class);
    }
    public function semestre() {
        return $this->belongsTo(Semestre::class);
    }
}
