<?php

namespace App\Actions\Fortify;

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
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'cedula' => ['required', 'string', 'max:15'],
            'rol' => ['required', 'string', 'max:15'],
            'tipo_de_recurso' => ['required', 'string', 'max:15'],
            'gerencia' => ['required', 'string', 'max:300'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'lastname' => $input['lastname'],
            'cedula' => $input['cedula'],
            'rol' => $input['rol'],
            'tipo_de_recurso' => $input['tipo_de_recurso'],
            'gerencia' => $input['gerencia'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
