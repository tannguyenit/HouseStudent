<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\PostRepository\PostRepository;
use App\Repositories\StatusRepository\StatusRepository;
use App\Repositories\TypeRepository\TypeRepository;
use App\Repositories\UserRepository\UserRepository;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    protected $typeRepository;
    protected $statusRepository;
    protected $postRepository;
    protected $userRepository;

    public function __construct(
        TypeRepository $typeRepository,
        StatusRepository $statusRepository,
        PostRepository $postRepository,
        UserRepository $userRepository
    ) {
        $this->typeRepository   = $typeRepository;
        $this->statusRepository = $statusRepository;
        $this->postRepository   = $postRepository;
        $this->userRepository   = $userRepository;
    }

    public function updateType(Request $request)
    {
        if ($request->ajax()) {
            $data      = $request->all();
            $id        = $data['id'];
            $fillable  = $this->typeRepository->getFillable();
            $attribute = array_only($data, $fillable);
            $type      = $this->typeRepository->find($id);

            if ($type) {
                $result = $this->typeRepository->update($attribute, $id, $slug = true);
                if ($result) {
                    return response()->json([
                        'status' => true,
                        'title'  => trans('validate.success'),
                        'msg'    => trans('validate.msg.edit-success'),
                    ]);
                }
            }
        }

        return response()->json([
            'status' => false,
            'title'  => trans('validate.errors'),
            'msg'    => trans('validate.msg.edit-fail'),
        ]);
    }

    public function deleteType(Request $request)
    {
        if ($request->ajax()) {
            $data   = $request->all();
            $id     = $data['id'];
            $result = $this->typeRepository->delete($id);

            if ($result) {
                return response()->json([
                    'status' => true,
                    'title'  => trans('validate.success'),
                    'msg'    => trans('validate.msg.delete-success'),
                ]);
            }
        }

        return response()->json([
            'status' => false,
            'title'  => trans('validate.errors'),
            'msg'    => trans('validate.msg.delete-fail'),
        ]);
    }

    public function updateStatus(Request $request)
    {
        if ($request->ajax()) {
            $data      = $request->all();
            $id        = $data['id'];
            $fillable  = $this->statusRepository->getFillable();
            $attribute = array_only($data, $fillable);
            $type      = $this->statusRepository->find($id);

            if ($type) {
                $result = $this->statusRepository->update($attribute, $id, $slug = true);
                if ($result) {
                    return response()->json([
                        'status' => true,
                        'title'  => trans('validate.success'),
                        'msg'    => trans('validate.msg.edit-success'),
                    ]);
                }
            }
        }

        return response()->json([
            'status' => false,
            'title'  => trans('validate.errors'),
            'msg'    => trans('validate.msg.edit-fail'),
        ]);
    }

    public function deleteStatus(Request $request)
    {
        if ($request->ajax()) {
            $data   = $request->all();
            $id     = $data['id'];
            $result = $this->statusRepository->delete($id);

            if ($result) {
                return response()->json([
                    'status' => true,
                    'title'  => trans('validate.success'),
                    'msg'    => trans('validate.msg.delete-success'),
                ]);
            }
        }

        return response()->json([
            'status' => false,
            'title'  => trans('validate.errors'),
            'msg'    => trans('validate.msg.delete-fail'),
        ]);
    }

    public function deletePost(Request $request)
    {
        if ($request->ajax()) {
            $data   = $request->all();
            $id     = $data['id'];
            $result = $this->postRepository->deletePost($id);

            if ($result) {
                return response()->json([
                    'status' => true,
                    'title'  => trans('validate.success'),
                    'msg'    => trans('validate.msg.delete-success'),
                ]);
            }
        }

        return response()->json([
            'status' => false,
            'title'  => trans('validate.errors'),
            'msg'    => trans('validate.msg.delete-fail'),
        ]);
    }

    public function deleteUser(Request $request)
    {
        if ($request->ajax()) {
            $data   = $request->all();
            $id     = $data['id'];
            $status = true;
            $user   = $this->userRepository->find($id);

            if (config('path.defaul-avatar') != $user->avatar) {
                $path   = public_path() . $user->avatar;
                $remove = $this->userRepository->deleteFiles($user->avatar, $path);

                if (!$remove) {
                    $status = false;
                }
            }

            $deleteUser = $this->userRepository->delete($id);

            if ($deleteUser && $status) {
                return response()->json([
                    'status' => true,
                    'title'  => trans('validate.success'),
                    'msg'    => trans('validate.msg.delete-success'),
                ]);
            }
        }

        return response()->json([
            'status' => false,
            'title'  => trans('validate.errors'),
            'msg'    => trans('validate.msg.delete-fail'),
        ]);
    }

    public function changeStatusPost(Request $request)
    {
        if ($request->ajax()) {
            $id     = $request->id;
            $status = $request->status;
            if ($id) {
                if (config('setting.active') == $status) {
                    $value = config('setting.no-active');
                } else {
                    $value = config('setting.active');
                }
                $inputs = [
                    'status' => $value,
                ];
                $updatePost = $this->postRepository->update($inputs, $id);

                if ($updatePost) {
                    return response()->json([
                        'status' => true,
                        'title'  => trans('validate.success'),
                        'msg'    => trans('validate.msg.change-success'),
                        'result' => $value,
                    ]);
                }
            }

            return response()->json([
                'status' => false,
                'title'  => trans('validate.errors'),
                'msg'    => trans('validate.msg.change-fail'),
            ]);
        }
    }

    public function changeActiveUser(Request $request)
    {
        if ($request->ajax()) {
            $id     = $request->id;
            $status = $request->status;
            if ($id) {
                if (config('setting.active') == $status) {
                    $value = config('setting.no-active');
                } else {
                    $value = config('setting.active');
                }
                $inputs = [
                    'active' => $value,
                ];
                $update = $this->userRepository->update($inputs, $id);

                if ($update) {
                    return response()->json([
                        'status' => true,
                        'title'  => trans('validate.success'),
                        'msg'    => trans('validate.msg.change-success'),
                        'result' => $value,
                    ]);
                }
            }

            return response()->json([
                'status' => false,
                'title'  => trans('validate.errors'),
                'msg'    => trans('validate.msg.change-fail'),
            ]);
        }
    }
}
