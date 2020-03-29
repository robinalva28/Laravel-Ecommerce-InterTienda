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
        $current_time=\Carbon\Carbon::now();

        $current_time->subYears(18);

        return Validator::make($data, [
            'nombre' => ['required', 'string','max:15','min:2'],
            'apellido' => ['required', 'string','max:15','min:2'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:usuarios'],
            'cuilEmpresa' => ['required', 'digits:11'],
            'celular'=> ['required','int'],
            'fechaNacimiento'=>['required','date','date_format:Y-m-d',"before_or_equal:$current_time"],
            'password' => ['required', 'string', 'min:8','confirmed', 'alpha_dash','different:nombre','different:email']
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
            'cuilEmpresa' => $data['cuilEmpresa'],
            'password' => Hash::make($data['password']),
            'avatar' => 'sinAvatar.png',
            'validado' => false,
            'isAdmin'=> false
        ]);
    }
}
