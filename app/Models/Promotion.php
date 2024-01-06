<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperPromotion
 */
class Promotion extends Model
{
    use HasFactory;

    protected $fillable  = [
        'promotion'
    ];
}
