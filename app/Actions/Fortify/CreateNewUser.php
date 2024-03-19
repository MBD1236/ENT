<?php

namespace App\Actions\Fortify;

use App\Models\Enseignant;
use App\Models\Etudiant;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'matricule' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $matricule = $input['matricule'];
        $etudiant = Etudiant::where('ine', $matricule)->first();
        $enseignant = Enseignant::where('matricule', $matricule)->first();
        $role = 0;
        if ($etudiant) {
            $role = 1;
        }
        elseif ($enseignant) {
            $role = 2;
        }
        return User::create([
            'nom' => $input['nom'],
            'prenom' => $input['prenom'],
            'matricule' => $input['matricule'],
            'role_id' => $role,
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

    }
}
