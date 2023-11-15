<?php

namespace App\Actions\Fortify;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use App\Models\vendedor;
use App\Models\Comprador;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'user_type' => ['required', 'string', 'max:255'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();


        return DB::transaction(function () use ($input) {
            return tap(User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'user_type' => $input['user_type'],
                'password' => Hash::make($input['password']),
            ]), function (User $user) use($input){

                if ($input['user_type'] == 'vendedor') {
                    $vendedor = new vendedor;
                    
                    Validator::make($input, [
                        'user_nameV' => 'required|string|max:255|unique:vendedors,nombre_usuario|unique:compradors,nombre_usuario',
                        'brand_name' => 'required|string|max:255|unique:vendedors,nombre_marca',
                    ], [
                        'user_nameV.required' => 'El campo Nombre de Usuario es obligatorio.',
                        'user_nameV.string' => 'El campo Nombre de Usuario debe ser una cadena de texto.',
                        'user_nameV.max' => 'El campo Nombre de Usuario no puede tener más de 255 caracteres.',
                        'user_nameV.unique' => 'El Nombre de Usuario ya está en uso.',
                        'brand_name.required' => 'El campo Nombre de Marca es obligatorio.',
                        'brand_name.string' => 'El campo Nombre de Marca debe ser una cadena de texto.',
                        'brand_name.max' => 'El campo Nombre de Marca no puede tener más de 255 caracteres.',
                        'brand_name.unique' => 'El Nombre de Marca ya está en uso.',
                    ])->validate();

                    $vendedor->nombre_usuario = $input['user_nameV'];
                    $vendedor->nombre_marca = $input['brand_name'];
                    $user->vendedor()->save($vendedor);

                } elseif ($input['user_type'] == 'comprador') {
                    $comprador = new Comprador;
                    $comprador->nombre_usuario = $input['user_name'];
                    
                    Validator::make($input, [
                        'user_name' => 'required|string|max:255|unique:compradors,nombre_usuario|unique:vendedors,nombre_usuario',
                    ], [
                        'user_name.required' => 'El campo Nombre de Usuario es obligatorio.',
                        'user_name.string' => 'El campo Nombre de Usuario debe ser una cadena de texto.',
                        'user_name.max' => 'El campo Nombre de Usuario no puede tener más de 255 caracteres.',
                        'user_name.unique' => 'El Nombre de Usuario ya está en uso.',
                    ])->validate();

                    $user->comprador()->save($comprador);
                }

                $this->createTeam($user);
            });
        });
        
    }


    /**
     * Create a personal team for the user.
     */
    protected function createTeam(User $user): void
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
