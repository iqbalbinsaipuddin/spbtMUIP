<?php

namespace App\Http\Controllers\Auth;

use App\Models\Pengguna;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
        return Validator::make($data, [
            'nama' => ['required', 'string', 'max:100'],
            'no_kp' => ['required', 'string', 'digits:12', 'unique:maklumat_pengguna'],
            'katalaluan' => ['required', 'string', 'min:8', 'confirmed'],
            'jawatan' => ['required', 'string', 'max:50'],
            'bahagian_unit' => ['required', 'string', 'max:50'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return Pengguna::create([
            'nama' => $data['nama'],
            'no_kp' => $data['no_kp'],
            'katalaluan' => openssl_encrypt($data['katalaluan'], "AES-128-CTR", "GeeksforGeeks", 0, '1234567891011121'),
            'jawatan' => $data['jawatan'],
            'bahagian_unit' => $data['bahagian_unit']
        ]);
    }
}
