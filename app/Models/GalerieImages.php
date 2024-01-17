<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalerieImages extends Model
{
    use HasFactory;

    protected $fillable = [
        'galerie_id',
        'imagePath',
    ];

    public function galerie() {
        return $this->belongsTo(Galerie::class);
    }
}
