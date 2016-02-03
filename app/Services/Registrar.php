<?php

namespace App\Services;

use App\User;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data) {

        return Validator::make($data, [
                    'pseudo' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:users',
                    'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function create(array $data) {

        $user = new User();

        return User::create([
                    'pseudo' => $data['pseudo'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
                    'siteweb' => $data['siteweb'],
                    'avatar' => $user->getAvatar(),
                    'signature' => $data['signature'],
                    'localisation' => $data['localisation'],
                    'inscrit' => $user->getDateInscription(),
                    'derniere_visite' => $user->getDateLastVisite(),
                    'rang' => 2,
                    'post' => $user->getNbPost()
        ]);
    }

}
