<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\TypeRepository\TypeRepository;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    protected $typeRepository;

    public function __construct(TypeRepository $typeRepository)
    {
        $this->typeRepository = $typeRepository;
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
