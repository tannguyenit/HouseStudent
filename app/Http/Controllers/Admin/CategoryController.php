<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $relationship      = ['posts'];
        $dataView['types'] = $this->categoryRepository->getData($relationship);

        return view('admin.type', $dataView);
    }

    public function store(Request $request)
    {
        $data      = $request->all();
        $fillable  = $this->categoryRepository->getFillable();
        $attribute = array_only($data, $fillable);
        $type      = $this->categoryRepository->create($attribute);

        if ($type) {
            return redirect()->action('Admin\CategoryController@index')->with([
                'status' => true,
                'msg'    => trans('form.success'),
            ]);
        } else {
            return redirect()->action('Admin\CategoryController@index')->with([
                'status' => false,
                'msg'    => trans('form.fail'),
            ]);
        }
    }
}
