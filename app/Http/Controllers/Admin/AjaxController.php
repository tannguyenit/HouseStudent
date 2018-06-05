<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository\CategoryRepositoryInterface;
use App\Repositories\PostRepository\PostRepositoryInterface;
use App\Repositories\StatusRepository\StatusRepositoryInterface;
use App\Repositories\UserRepository\UserRepositoryInterface;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    protected $categoryRepository;
    protected $statusRepository;
    protected $postRepository;
    protected $userRepository;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        StatusRepositoryInterface $statusRepository,
        PostRepositoryInterface $postRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->statusRepository   = $statusRepository;
        $this->postRepository     = $postRepository;
        $this->userRepository     = $userRepository;
    }

    public function updateType(Request $request)
    {
        if ($request->ajax()) {
            $data      = $request->all();
            $id        = $data['id'];
            $fillable  = $this->categoryRepository->getFillable();
            $attribute = array_only($data, $fillable);
            $type      = $this->categoryRepository->find($id);

            if ($type) {
                $result = $this->categoryRepository->update($attribute, $id, $slug = true);
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
            $result = $this->categoryRepository->delete($id);

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
                    'active' => $value,
                ];
                $updatePost = $this->postRepository->update($inputs, $id);

                if ($updatePost) {
                    $data = [
                        'title'  => trans('validate.success'),
                        'msg'    => trans('validate.msg.change-success'),
                        'result' => $value,
                    ];
                    return $this->success($data);
                }
            }

            $data = [
                'title' => trans('validate.errors'),
                'msg'   => trans('validate.msg.change-fail'),
            ];

            return $this->error($data);
        }
    }

    public function changeStatusPin(Request $request)
    {
        if ($request->ajax()) {
            $id     = $request->id;
            $status = $request->status;

            if ($id) {
                if (config('setting.pin.not-active') == $status) {
                    $value = config('setting.pin.not-active');
                } else if (config('setting.pin.waitting') == $status) {
                    $value = config('setting.pin.waitting');
                } else {
                    $value = config('setting.pin.active');
                }

                $inputs = [
                    'pin' => $value,
                ];
                $updatePost  = $this->postRepository->update($inputs, $id);
                $arrPost     = $this->postRepository->findBy('pin', config('setting.pin.active'))->count();
                $arrWherePin = [
                    'pin' => config('setting.pin.active'),
                ];

                if ($arrPost > config('constant.limit-pin')) {
                    $changePin = $this->postRepository->whereArray($arrWherePin);
                    $arWhere   = [
                        'pin' => config('setting.pin.not-active'),
                    ];
                    $this->postRepository->update($arWhere, $changePin->id);
                }

                if ($updatePost) {
                    $data = [
                        'title'  => trans('validate.success'),
                        'msg'    => trans('validate.msg.change-success'),
                        'result' => $value,
                    ];

                    return $this->success($data);
                }
            }

            $data = [
                'title' => trans('validate.errors'),
                'msg'   => trans('validate.msg.change-fail'),
            ];

            return $this->error($data);
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
