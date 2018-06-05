<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Socialite;

class RegisterController extends Controller
{

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

    /**
     * Redirect the user to the OAuth Provider.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that
     * redirect them to the authenticated users homepage.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        if (!empty($_GET['error_code'])) {
            return redirect()->route('client.home');
        }

        try {
            $userSoccial = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return redirect()->action('HomeController@home');
        }

        $gender     = $userSoccial->user['gender'];
        $token      = $userSoccial->token;
        $id         = $userSoccial->getId();
        $nickname   = $userSoccial->getNickname();
        $name       = $userSoccial->getName();
        $email      = $userSoccial->getEmail();
        $avatar     = $userSoccial->avatar_original;
        $checkEmail = $this->userRepository->findByFirst('email', $email);

        if ($checkEmail) {
            return redirect()->action('HomeController@home')
                ->with([
                    'status' => false,
                    'msg'    => trans('layout.regis.success'),
                ]);
        }

        $findUser = $this->userRepository->findByFirst('provice_id', $id);

        if (!$findUser) {
            if ($email) {
                $username  = explode('@', $email)[0];
                $checkUser = $this->userRepository->findByFirst('username', $username);

                if ($checkUser) {
                    $username = $username . '_' . rand(0, 99);
                }
            } else {
                $username = $id;
                $email    = $id;
            }
            /**
             *---------------------------
             * Get image avatar
             * ---------------------------
             */
            $avatarName = $id . '.jpg';
            $image      = file_get_contents($avatar);
            $file       = public_path() . config('path.avatar') . $avatarName;
            file_put_contents($file, $image);
            /**
             *---------------------------
             * Get gender
             * ---------------------------
             */
            $gender = '';
            if ('male' == $gender) {
                $gender = config('setting.gender.male');
            } else {
                $gender = config('setting.gender.female');
            }
            /**
             *---------------------------
             * data insert
             * ---------------------------
             */
            $data = [
                'username'       => $username,
                'first_name'     => $name,
                'last_name'      => $name,
                'email'          => $email,
                'password'       => '',
                'avatar'         => $avatarName,
                'gender'         => $gender,
                'provice_id'     => $id,
                'active'         => '1',
                'role'           => config('setting.role.member'),
                'remember_token' => $token,
            ];

            $user = $this->userRepository->create($data);
        } else {
            $user = $userSoccial;
        }

        auth()->login($user, true);

        return redirect()->action('HomeController@home');
    }
}
