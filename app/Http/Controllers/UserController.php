<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository\UserRepository;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    protected $userRepository;

    public function __construct(
        UserRepository $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $slug)
    {
        $detailUser = $this->userRepository->findByFirst('username', $slug);

        if ($detailUser) {
            return view('author.my-profile', compact('detailUser'));
        }

        return abort(404);
    }

    public function update(Request $request, $id)
    {
        $user = $this->userRepository->find($id);
        if ($user) {
            $status    = true;
            $data      = $request->all();
            $fillable  = $this->userRepository->getFillable();
            $attribute = array_only($data, $fillable);

            if ($request->avatar) {
                if ($user->avatar) {
                    $path   = public_path() . $user->avatar;
                    $remove = $this->userRepository->deleteFiles($user->avatar, $path);

                    if (!$remove) {
                        $status = false;
                    }
                }

                $avatar = $this->userRepository->uploadImage($request->avatar, config('path.avatar'));

                if ($avatar && $status) {
                    $attribute['avatar'] = $avatar;
                }
            }
            $update = $this->userRepository->update($attribute, $id);

            if ($update) {
                return redirect()->action('UserController@index', $user->username)
                    ->with('success', trans('validate.msg.edit-success'));
            } else {
                return redirect()->action('UserController@index', $user->username)
                    ->with('error', trans('validate.msg.edit-fail'));
            }
        }
    }

    public function checkEmail(Request $request)
    {
        if ($request->ajax()) {
            $email = $request->email;
            $new   = $request->new;
            $id    = $request->id;

            return $this->checkByColumn($new, 'email', $email, $id);
        }
    }

    public function checkusername(Request $request)
    {
        if ($request->ajax()) {
            $username = $request->username;
            $new      = $request->new;
            $id       = $request->id;

            return $this->checkByColumn($new, 'username', $username, $id);
        }
    }

    public function checkByColumn($new, $column, $value, $id)
    {
        if ($new) {
            $checkColumn = $this->userRepository->checkExists($column, $value);

            if ($checkColumn) {
                return response()->json([
                    'result' => true,
                ]);
            }
        } else {
            $checkColumn = $this->userRepository->checkExists($column, $value, $id);

            if ($checkColumn) {
                return response()->json([
                    'result' => true,
                ]);
            }
        }

        return response()->json([
            'result' => false,
        ]);
    }
}
