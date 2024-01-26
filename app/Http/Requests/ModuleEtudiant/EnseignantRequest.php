<?php

namespace App\Http\Requests\ModuleEtudiant;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EnseignantRequest extends FormRequest
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
        $id = $this->route("enseignant");
        
        return [
            'matricule' => ['required','string', 'min:2', Rule::unique('enseignants')->ignore($id, 'id')],
            'nom' => ['required','string', 'min:2'],
            'prenom' => ['required','string', 'min:2'],
            'telephone' => ['required','string', 'min:2',],
            'email' => ['required','email', 'min:2', Rule::unique('enseignants')->ignore($id, 'id')],
            'adresse' => ['required','string', 'min:2',],
            'photo' => ['required','image','mimes:jpeg,png,gif,jpg,svg'],
            // 'user_id' => ['required','numeric', 'exists:users,id'],
            'departement_id' => ['required','numeric', 'exists:departements,id'],
        ];
    }
}
