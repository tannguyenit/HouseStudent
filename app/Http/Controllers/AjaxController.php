<?php

namespace App\Http\Controllers;

use App\Repositories\ImageRepository\ImageRepository;
use App\Repositories\PostRepository\PostRepository;
use Illuminate\Http\Request;
use View;

class AjaxController extends BaseController
{
    protected $postRepository;
    protected $imageRepository;

    public function __construct(
        PostRepository $postRepository,
        ImageRepository $imageRepository
    ) {
        $this->postRepository  = $postRepository;
        $this->imageRepository = $imageRepository;
    }

    public function getMap(Request $request)
    {
        if ($request->ajax()) {
            $dataSearch   = $request->all();
            $sortBy       = $this->postRepository->getSortBy(null);
            $relationship = ['user', 'images'];
            $data         = $this->postRepository->getAllData($dataSearch, $sortBy, $relationship)->get();

            if ($request->keyword) {
                $keyword = $request->keyword;
                return view('ajax.search-keyword', compact('data', 'keyword'));
            }

            if ($data) {
                $properties = [];
                foreach ($data as $element) {
                    $properties[] = [
                        "id"           => $element->id,
                        "title"        => $element->title,
                        "lat"          => $element->lat,
                        "lng"          => $element->lng,
                        "address"      => $element->address,
                        "thumbnail"    => "<img width=\"385\" height=\"258\" src=\"http://houzez01.favethemes.com/wp-content/uploads/2016/03/new-york-08-385x258.jpg\" class=\"attachment-houzez-property-thumb-image size-houzez-property-thumb-image wp-post-image\" alt=\"\" srcset=\"http://houzez01.favethemes.com/wp-content/uploads/2016/03/new-york-08-385x258.jpg 385w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/new-york-08-300x202.jpg 300w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/new-york-08-768x516.jpg 768w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/new-york-08-1024x688.jpg 1024w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/new-york-08-150x101.jpg 150w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/new-york-08-350x235.jpg 350w, http://houzez01.favethemes.com/wp-content/uploads/2016/03/new-york-08.jpg 1170w\" sizes=\"(max-width: 385px) 100vw, 385px\" />",
                        "url"          => action('PostController@show', $element->slug),
                        "prop_meta"    => "<p><span>Dien tich: " . $element->area . " metvuong</span></p>",
                        "type"         => $element->user->username,
                        "images_count" => count($element->images),
                        "price"        => "<span class=\"item-price\">" . $element->price . "</span><span class=\"item-sub-price\">" . $element->price . "VND/thang</span>",
                        "icon"         => "http://sandbox.favethemes.com/houzez/wp-content/uploads/2016/02/x1-apartment.png",
                        "retinaIcon"   => "http://sandbox.favethemes.com/houzez/wp-content/uploads/2016/02/x2-apartment.png",
                    ];
                }

                return response()->json([
                    'getProperties' => true,
                    'properties'    => $properties,
                ]);
            }
        }

        return response()->json([
            'getProperties' => false,
            'properties'    => [],
        ]);
    }

    public function uploadFileUploader(Request $request)
    {
        if ($request->ajax()) {
            $files  = $request->file('file')[0];
            $upload = $this->postRepository->uploadImage($files, config('path.temp'));

            if ($upload) {
                return response()->json([
                    'status' => true,
                    'title'  => trans('validate.success'),
                    'msg'    => trans('validate.msg.create-success'),
                ]);
            }

            return response()->json([
                'status' => false,
                'title'  => trans('validate.errors'),
                'msg'    => trans('validate.msg.create-fail'),
            ]);
        }
    }

    public function removeFileUploader(Request $request)
    {
        if ($request->ajax()) {
            $image = $request->image;
            $id    = $request->post_id;

            if ($id) {
                $path   = public_path() . $image;
                $image  = str_replace(config('path.post'), '', $image);
                $delete = $this->imageRepository->deleteImage($id, $image);
            } else {
                $delete = true;
                $path   = public_path() . config('path.temp') . $image;
            }

            if (file_exists($path) && unlink($path) && $delete) {
                $result = true;
            }

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
            'msg'    => trans('validate.msg.change-fail'),
        ]);
    }

    public function moveImage($file, $fileNew)
    {
        if (empty($file) || empty($fileNew)) {
            return false;
        }

        $pathOld = public_path() . config('path.temp') . $file;
        $pathNew = public_path() . config('path.topics') . $fileNew;

        if (file_exists($pathOld)) {
            if (!is_dir(public_path() . config('path.forums'))) {
                mkdir(public_path() . config('path.forums'), 0777);
            }

            if (!is_dir(public_path() . config('path.topics'))) {
                mkdir(public_path() . config('path.topics'), 0777);
            }

            $rename = rename($pathOld, $pathNew);

            if ($rename) {
                return true;
            }
        }

        return false;
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
}
