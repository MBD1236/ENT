<?php

namespace App\Http\Requests\ModuleEtudiant;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AnneeUniversitaireRequest extends FormRequest
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
        $id = $this->route("annee_universitaire");
        return [
            'annee_universitaire' => ['required','string','min:9' , Rule::unique('annee_universitaires')->ignore($id, 'id')],
        ];
    }
}
