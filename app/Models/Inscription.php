<?php

namespace App\Models;

use App\Models\Etudiant;
use App\Models\Niveau;
use App\Models\Promotion;
use App\Models\Session;
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
        "session_id"
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
    public function session() {
        return $this->belongsTo(Session::class);
    }
    public function programme() {
        return $this->belongsTo(Programme::class);
    }
}
