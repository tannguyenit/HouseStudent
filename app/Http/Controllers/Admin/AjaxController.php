<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\PostRepository\PostRepository;
use App\Repositories\StatusRepository\StatusRepository;
use App\Repositories\TypeRepository\TypeRepository;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    protected $typeRepository;
    protected $statusRepository;
    protected $postRepository;

    public function __construct(
        TypeRepository $typeRepository,
        StatusRepository $statusRepository,
        PostRepository $postRepository
    ) {
        $this->typeRepository   = $typeRepository;
        $this->statusRepository = $statusRepository;
        $this->postRepository   = $postRepository;
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
                $result = $this->typeRepository->update($attribute, $id);
                if ($result) {
                    return response()->json([
                        'status' => true,
                        'msg'    => trans('form.result.success'),
                    ]);
                }
            }
        }

        return response()->json([
            'status' => false,
            'msg'    => trans('form.result.fail'),
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
                    'msg'    => trans('form.result.success'),
                ]);
            }
        }

        return response()->json([
            'status' => false,
            'msg'    => trans('form.result.fail'),
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
                $result = $this->statusRepository->update($attribute, $id);
                if ($result) {
                    return response()->json([
                        'status' => true,
                        'msg'    => trans('form.result.success'),
                    ]);
                }
            }
        }

        return response()->json([
            'status' => false,
            'msg'    => trans('form.result.fail'),
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
                    'msg'    => trans('form.result.success'),
                ]);
            }
        }

        return response()->json([
            'status' => false,
            'msg'    => trans('form.result.fail'),
        ]);
    }

    public function deletePost(Request $request)
    {
        if ($request->ajax()) {
            $data   = $request->all();
            $id     = $data['id'];
            $result = $this->postRepository->deletePost($id);
            dd($result);
            if ($result) {
                return response()->json([
                    'status' => true,
                    'msg'    => trans('form.result.success'),
                ]);
            }
        }

        return response()->json([
            'status' => false,
            'msg'    => trans('form.result.fail'),
        ]);
    }
}
