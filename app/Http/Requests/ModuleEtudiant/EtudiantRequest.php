<?php

namespace App\Http\Requests\ModuleEtudiant;

use Doctrine\Inflector\Rules\French\Rules;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule as ValidationRule;

class EtudiantRequest extends FormRequest
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
     * 'regex:^(\+|00)[0-9]{9,15}$'
     */
    public function rules(): array
    {
        $id = $this->route("etudiant");
        return [
            'nom' => ['required','string','min:2'],
            'prenom' => ['required','string','min:2'],
            'telephone'=> ['required','regex:/^([0-9\s\-\+\(\)]*)$/','between:9,18', ValidationRule::unique('etudiants')->ignore($id,'id')],
            'email'=> ['required','email', ValidationRule::unique('etudiants')->ignore($id,'id')],
            'pv'=> ['required','integer', ValidationRule::unique('etudiants')->ignore($id,'id')],
            'ine'=> ['required','string','min:14','max:20', ValidationRule::unique('etudiants')->ignore($id,'id')],
            'session'=> ['required','string'],
            'profil'=> ['required','string', 'min:2'],
            'centre'=> ['required','string', 'min:2'],   
            'ecole_origine'=> ['required','string'],
            'date_naissance'=> ['required','date'],
            'lieu_naissance'=> ['required','string','min:2'],
            'pere'=> ['required','string','min:2'],
            'mere'=> ['required','string','min:2'],
            'departement'=> ['required','string','min:2'],
            'nom_tuteur'=> ['string','min:2'],
            'telephone_tuteur'=> ['regex:/^([0-9\s\-\+\(\)]*)$/','between:9,18', ValidationRule::unique('etudiants')->ignore($id,'id')],
            'adresse'=> ['string','min:2'],
            'diplome'=> ['required','mimes:jpeg,png,jpg,gif,svg,ico,pdf'],
            'releve_notes'=> ['required','mimes:jpg,jpeg,png,gif,svg,ico,pdf'],
            'certificat_nationalite'=> ['required','mimes:jpg,jpeg,svg,png,gif,ico,pdf'],
            'certificat_medical'=> ['required','mimes:jpg,jpeg,png,svg,gif,ico,pdf'],
            'extrait_naissance'=> ['required','mimes:jpg,jpeg,png,gif,svg,ico,pdf'],
            'photo'=> ['required','image','mimes:jpg,jpeg,png,gif,svg'],
        ];
    }
}
