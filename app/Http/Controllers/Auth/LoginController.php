<?php

namespace App\Http\Controllers\Auth;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function  login(Request $request)
    {
        $credentials = $request->validate([
            'no_kp' => ['required', 'digits:12'],
            'katalaluan' => ['required'],
        ]);

        $credentials['password'] = openssl_encrypt($credentials['katalaluan'], "AES-128-CTR", "GeeksforGeeks", 0, '1234567891011121');
        // dd($credentials);
 
        $user = Pengguna::where('no_kp', $credentials['no_kp'])
                ->where('katalaluan', $credentials['password'])
                ->first();

        if($user) {
            Auth::login($user);
            return redirect()->route('home');
        }
 
        return back()->withErrors([
            'no_kp' => 'The provided credentials do not match our records.',
        ])->onlyInput('no_kp');
    }
}
