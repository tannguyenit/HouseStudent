<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\PostRepository\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        $relationship      = ['user', 'images', 'features'];
        $dataView['posts'] = $this->postRepository->getAllDatasAdmin($relationship, config('setting.limit.news_post'));

        return view('admin.post', $dataView);
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
