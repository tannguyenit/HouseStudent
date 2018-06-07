<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository\UserRepositoryInterface;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
     */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->middleware('guest');
        $this->userRepository = $userRepository;
    }

    public function getPassword()
    {
        return view('emails.changepass');
    }

    public function change(Request $request, $id)
    {
        try {
            $user = $this->userRepository->find($id);
            if ($user && $user->email == $request->email && $user->active == $request->active) {
                $user->password = bcrypt($request->new_password);

                if ($user->save()) {
                    return redirect()->action('HomeController@home');
                }
            }
        } catch (Exception $ex) {
            return view('errors.404');
        }
    }
}
