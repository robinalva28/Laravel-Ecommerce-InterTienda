<?php

namespace App\Http\Controllers\Auth;


use App\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/';
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
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {


        $edad = Carbon::now()->subYears(18);
        $edad->format('Y-m-d');
        /*return dd( $edad->format('Y-m-d'));exit;*/

        return Validator::make($data, [
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:usuarios'],
            'fechaNacimiento'=>['required','date','before:'. $edad->format('Y-m-d')],
            'password' => ['required', 'string', 'min:4','confirmed']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        //
        return User::create([
            'nombre' => $data['nombre'],
            'apellido' => $data ['apellido'],
            'celular' => $data ['celular'],
            'email' => $data['email'],
            'fechaNacimiento' => $data['fechaNacimiento'],
            'password' => Hash::make($data['password']),
            'avatar' => $data['avatar'],
            'validado' => false,
            'isAdmin'=> false
        ]);
    }
}
