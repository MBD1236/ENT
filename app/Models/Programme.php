<?php

namespace App\Models;

use App\Models\Departement;
use App\Models\Inscription;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'departement_id'
    ];

    public function departement() {
        return $this->belongsTo(Departement::class);
    }
    public function inscriptions() {
        return $this->hasMany(Inscription::class);
    }
}
