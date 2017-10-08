<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\FeaturesRepository\FeaturesRepository;
use App\Repositories\ImageRepository\ImageRepository;
use App\Repositories\PostRepository\PostRepository;
use App\Repositories\StatusRepository\StatusRepository;
use App\Repositories\TypeRepository\TypeRepository;
use DB;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postRepository;
    protected $featuresRepository;
    protected $typeRepository;
    protected $statusRepository;
    protected $imageRepository;

    public function __construct(
        TypeRepository $typeRepository,
        StatusRepository $statusRepository,
        PostRepository $postRepository,
        FeaturesRepository $featuresRepository,
        ImageRepository $imageRepository
    ) {
        $this->typeRepository     = $typeRepository;
        $this->statusRepository   = $statusRepository;
        $this->postRepository     = $postRepository;
        $this->featuresRepository = $featuresRepository;
        $this->imageRepository    = $imageRepository;
    }

    public function index()
    {
        $relationship      = ['user', 'images', 'features'];
        $dataView['posts'] = $this->postRepository->getAllDatasAdmin($relationship, config('setting.limit.news_post'));

        return view('admin.post.index', $dataView);
    }

    public function show(Request $request, $id)
    {
        if ($id) {
            $relationship         = ['images', 'type', 'status', 'features'];
            $dataView['types']    = $this->typeRepository->all();
            $dataView['statuses'] = $this->statusRepository->all();
            $dataView['post']     = $this->postRepository->find($id, $relationship);

            return view('admin.post.edit', $dataView);
        }
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            if ($id) {
                $result                     = true;
                $deleteFeatures             = true;
                $data                       = $request->all();
                $fillable                   = $this->postRepository->getFillable();
                $attribute                  = array_only($data, $fillable);
                $attribute['price']         = setPrice($request->price);
                $attribute['township_slug'] = str_slug($request->administrative_area_level_2);
                $attribute['township']      = $request->administrative_area_level_2;
                $attribute['country']       = $request->administrative_area_level_1;
                $updatePost                 = $this->postRepository->update($attribute, $id);
                $detailPost                 = $this->postRepository->find($id, ['features']);

                if (count($detailPost->features)) {
                    $deleteFeatures = $this->featuresRepository->deleteByColum('post_id', $id);
                }

                if ($updatePost && $deleteFeatures) {
                    $features = $request->additional_features;

                    if ($features) {
                        $featuresArray = [];

                        foreach ($features as $key => $element) {
                            if ($element['key'] && $element['value']) {
                                $featuresArray[$key]['title'] = $element['key'];
                                $featuresArray[$key]['value'] = $element['value'];
                            }
                        }

                        if (count($featuresArray)) {
                            if (!$detailPost->features()->createMany($featuresArray)) {
                                return $result = false;
                            };
                        }
                    }
                    /* ------------------------------------------------------------------------ */
                    /*  Save Files
                    /* ------------------------------------------------------------------------ */
                    $fileUpload = $request->file;
                    if ($fileUpload && "[]" != $fileUpload) {
                        $images = json_decode($fileUpload);

                        foreach ($images as $key => $value) {
                            $fileExists = strstr($value, config('path.post'));

                            if (!$fileExists) {
                                $fileNew = $this->imageRepository->addFile($value, $id);

                                if ($fileNew) {
                                    $moveFile = $this->imageRepository->moveImage($value, $fileNew, config('path.post'));

                                    if (!$moveFile) {
                                        $result = false;
                                    }
                                }
                            }
                        }
                    }
                }

                if ($result) {
                    DB::commit();

                    return redirect()->action('Admin\PostController@index')
                        ->with('success', trans('validate.msg.edit-success'));
                } else {
                    return redirect()->action('Admin\PostController@index')
                        ->with('error', trans('validate.msg.edit-fail'));
                }
            }
        } catch (Exception $e) {
            DB::rollback();

            return redirect()->action('Admin\PostController@index')
                ->with('error', trans('validate.msg.edit-fail'));
        }
    }
}