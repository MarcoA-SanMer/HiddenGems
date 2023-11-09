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
                    $vendedor->nombre_usuario = $input['user_nameV'];
                    $vendedor->nombre_marca = $input['brand_name'];
                    $user->vendedor()->save($vendedor);
                } elseif ($input['user_type'] == 'comprador') {
                    $comprador = new Comprador;
                    $comprador->nombre_usuario = $input['user_name'];
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
