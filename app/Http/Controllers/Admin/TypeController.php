<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\TypeRepository\TypeRepository;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    protected $typeRepository;

    public function __construct(TypeRepository $typeRepository)
    {
        $this->typeRepository = $typeRepository;
    }

    public function index()
    {
        $relationship      = ['posts'];
        $dataView['types'] = $this->typeRepository->getData($relationship);

        return view('admin.type', $dataView);
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
}
