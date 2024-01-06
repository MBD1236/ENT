<?php

namespace App\Http\Requests\ModuleEtudiant;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SessionRequest extends FormRequest
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
        $id = $this->route("session");
        return [
            'session' => ['required','string','min:9' , Rule::unique('sessions')->ignore($id, 'id')],
        ];
    }
}
