<?php

namespace App\Http\Requests\ModuleEtudiant;

use Illuminate\Foundation\Http\FormRequest;

class SemestreRequest extends FormRequest
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
            'semestre' => ['required', 'min:2', 'unique:semestres']
        ];
    }
}
