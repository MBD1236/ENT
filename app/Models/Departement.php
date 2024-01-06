<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;

    protected $fillable = [
        'departement',
        'telephone',
        'email',
        'adresse',
        'codedepartement',
        'photo',
        'description',
        // 'user_id'
    ];

    // public function user() {
    //     return $this->belongsTo(User::class, 'user_id');
    // }
    public function inscriptions() {
        return $this->hasMany(Inscription::class);
    }
}
