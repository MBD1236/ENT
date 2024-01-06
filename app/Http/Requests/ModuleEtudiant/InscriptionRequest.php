<?php

namespace App\Http\Requests\ModuleEtudiant;

use Illuminate\Foundation\Http\FormRequest;

class InscriptionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // "ine" => ["required","string","min:14","max:20"],
            "etudiant_id" => ["required","exists:etudiants,id"],
            "promotion_id" => ["required","exists:promotions,id"],
            "niveau_id" => ["required","exists:niveaux,id"],
            "session_id" => ["required","exists:sessions,id"],
            "programme_id" => ["required","exists:programmes,id"],
        ];
    }
}
