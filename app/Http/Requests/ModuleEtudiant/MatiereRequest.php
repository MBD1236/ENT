<?php

namespace App\Http\Requests\ModuleEtudiant;

use Illuminate\Foundation\Http\FormRequest;

class MatiereRequest extends FormRequest
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
            'matiere' => ['required', 'min:2'],
            'semestre_id' => ['required', 'exists:semestres,id'],
            'programme_id' => ['required', 'exists:programmes,id'],
        ];
    }
}
