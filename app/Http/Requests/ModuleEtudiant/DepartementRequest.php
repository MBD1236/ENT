<?php

namespace App\Http\Requests\ModuleEtudiant;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DepartementRequest extends FormRequest
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
        $id = $this->route("departement");
        return [
            'departement' => ['required', 'string', 'min:2'],
            'telephone' => ['required', 'string', 'min:2'],
            'email' => ['required','email', 'min:2', Rule::unique('departements')->ignore($id, 'id')],
            'adresse' => ['required', 'string', 'min:2'],
            'codedepartement' => ['required', 'min:2', 'string', Rule::unique('departements')->ignore($id, 'id')],
            'description'=> ['required', 'string', 'min:2'],
            'photo' => ['required','image','mimes:jpeg,png,jpg,gif,svg'],
            // 'user_id'=>['required','numeric','exists:users,id'],
        ];
    }
}
