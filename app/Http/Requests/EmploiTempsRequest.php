<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmploiTempsRequest extends FormRequest
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
            "horaire" => ['required', 'string'],
            "jour" => ['required', 'string'],
            "salle" => ['required', 'string'],
            "departement_id" => ['required'],
            "session_id" => ['required'],
            "promotion_id" => ['required'],
            "niveau_id" => ['required'],
            "enseignant_id" => ['required'],
            "matiere_id" => ['required'],
            "semestre_id" => ['required'],
        ];
    }
}
