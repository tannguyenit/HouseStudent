<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\StatusRepository\StatusRepository;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    protected $statusRepository;

    public function __construct(StatusRepository $statusRepository)
    {
        $this->statusRepository = $statusRepository;
    }

    public function index()
    {
        $relationship       = ['posts'];
        $dataView['status'] = $this->statusRepository->getData($relationship);

        return view('admin.status', $dataView);
    }

    public function store(Request $request)
    {
        $data      = $request->all();
        $fillable  = $this->statusRepository->getFillable();
        $attribute = array_only($data, $fillable);
        $type      = $this->statusRepository->create($attribute);

        if ($type) {
            return redirect()->action('Admin\StatusController@index')->with([
                'status' => true,
                'msg'    => trans('form.success'),
            ]);
        } else {
            return redirect()->action('Admin\StatusController@index')->with([
                'status' => false,
                'msg'    => trans('form.fail'),
            ]);
        }
    }
}
