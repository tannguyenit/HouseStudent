<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Repositories\UserRepository\UserRepositoryInterface;
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
    protected $userRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->middleware('guest')->except('logout');
        $this->userRepository = $userRepository;
    }

    public function postLogin(LoginRequest $request)
    {
        $input    = $request->email;
        $findUser = $this->userRepository->findByFirst('email', $input);

        if ($findUser) {
            $login = [
                'email'    => $request->email,
                'password' => $request->password,
            ];

            if (config('setting.active') == $findUser->active) {
                $checkLogin = Auth::attempt($login, $request->remember);
                if ($checkLogin) {
                    return response()->json([
                        'success' => true,
                        'msg'     => trans('form.login-success'),
                    ]);
                }
            } else {
                return response()->json([
                    'success' => false,
                    'msg'     => trans('form.login-watting'),
                ]);
            }
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
