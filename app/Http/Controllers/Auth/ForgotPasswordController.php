<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use App\Repositories\UserRepository\UserRepository;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
     */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('guest');
        $this->userRepository = $userRepository;
    }

    public function sendMail(Request $request)
    {
        $email = $request->email;
        $user  = $this->userRepository->getDataByEmail($email);

        if (!empty($user)) {
            $data = [
                'id'        => $user->id,
                'email'     => $user->email,
                'full_name' => $user->full_name,
                'active'    => $user->active,
            ];

            \Mail::to($email)->send(new ForgotPassword($data));

            return response()->json([
                'success' => true,
                'msg'     => trans('form.email-success'),
            ]);
        } else {
            return response()->json([
                'success' => false,
                'msg'     => trans('form.email-not-exists'),
            ]);
        }
    }
}
