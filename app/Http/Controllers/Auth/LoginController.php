<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Auth;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function postLogin(LoginRequest $request)
    {
        $checkLogin = false;
        $login      = [
            'email'    => $request->email,
            'password' => $request->password,
        ];
        $checkLogin = Auth::attempt($login, $request->remember);

        if ($checkLogin) {
            return response()->json([
                'success' => true,
                'msg'     => trans('form.login-success'),
            ]);
        }
        return response()->json([
            'success' => false,
            'msg'     => trans('form.login-fail'),
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->action('HomeController@home');
    }
}
