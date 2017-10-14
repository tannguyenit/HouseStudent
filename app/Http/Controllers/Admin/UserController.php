<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $relationship      = ['posts'];
        $dataView['users'] = $this->userRepository->getAllDatas($relationship, config('setting.limit.user-table'));

        return view('admin.user.index', $dataView);
    }

    public function store(Request $request)
    {
        $data      = $request->all();
        $fillable  = $this->typeRepository->getFillable();
        $attribute = array_only($data, $fillable);
        $type      = $this->typeRepository->create($attribute);

        if ($type) {
            return redirect()->action('Admin\TypeController@index')->with([
                'status' => true,
                'msg'    => trans('form.success'),
            ]);
        } else {
            return redirect()->action('Admin\TypeController@index')->with([
                'status' => false,
                'msg'    => trans('form.fail'),
            ]);
        }
    }

    public function show(Request $request, $slug)
    {
        $user = $this->userRepository->findByFirst('username', $slug);
        if ($user) {
            $dataView['detailUser'] = $user;

            return view('admin.user.edit', $dataView);
        }
        return abort(404);
    }

    public function update(Request $request, $id)
    {
        $user = $this->userRepository->find($id);
        if ($user) {
            $status                = true;
            $data                  = $request->all();
            $fillable              = $this->userRepository->getFillable();
            $attribute             = array_only($data, $fillable);
            $attribute['birthday'] = setBirthdayUser($request->birthday);

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
                return redirect()->action('Admin\UserController@index')
                    ->with('success', trans('validate.msg.edit-success'));
            } else {
                return redirect()->action('Admin\UserController@index')
                    ->with('error', trans('validate.msg.edit-fail'));
            }
        }
    }
}
