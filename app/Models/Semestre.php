<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    use HasFactory;

    protected $fillable =[
        'semestre'
    ];

    public function matieres() {
        return $this->hasMany(Matiere::class);
    }
}
