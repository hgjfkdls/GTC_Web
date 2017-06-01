<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/register_successful';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => ['required', 'email', 'max:255', 'unique:users', 'regex:/^\w+@sacyr\.(cl|com)$/i'],
            'password' => 'required|min:6|confirmed',
        ], [
            'name.max' => 'El nombre no puede exeder los 255 carácteres',
            'email.email' => 'El email no es una dirección de correo válida',
            'email.regex' => 'El dominio del email debe ser @sacyr.cl o @sacyr.com',
            'email.unique' => 'El email ingresado ya se encuentra registrado',
            'password.min' => 'La contraseña debe tener como mínimo 6 caracteres',
            'password.confirmed' => 'La confirmación de la contraseña no es válida'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
