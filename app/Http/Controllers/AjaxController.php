<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository\PostRepository;
use Illuminate\Http\Request;
use View;

class AjaxController extends BaseController
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getMap(Request $request)
    {
        if ($request->ajax()) {
            $dataSearch = $request->all();
            $sortBy     = $this->postRepository->getSortBy(null);
            $data       = $this->postRepository->getAllData($dataSearch, $sortBy, ['user'])->get();

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
                        "images_count" => 7,
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
                    'status'  => true,
                    'type'    => trans('forums.result.success'),
                    'message' => trans('forums.action.create') . trans('forums.result.is_success'),
                ]);
            }

            return response()->json([
                'status'  => false,
                'type'    => trans('forums.result.error'),
                'message' => trans('forums.action.create') . trans('forums.result.is_fail'),
            ]);
        }
    }

    public function removeFileUploader(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            $file = $data['file_name'];
            $path = public_path() . config('path.temp') . $file;

            if (isset($data['file_id'])) {
                $managerFile = ManagerFile::where($data)->delete();

                if ($managerFile) {
                    $path = public_path() . config('path.topics') . $file;

                    if (file_exists($path)) {
                        unlink($path);

                        return response()->json([
                            'status'  => true,
                            'type'    => trans('forums.result.success'),
                            'message' => trans('forums.action.delete') . trans('forums.result.is_success'),
                        ]);
                    }
                }
            }

            if (file_exists($path)) {
                unlink($path);

                return response()->json([
                    'status'  => true,
                    'type'    => trans('forums.result.success'),
                    'message' => trans('forums.action.delete') . trans('forums.result.is_success'),
                ]);
            }

            return response()->json([
                'status'  => false,
                'type'    => trans('forums.result.error'),
                'message' => trans('forums.action.delete') . trans('forums.result.is_fail'),
            ]);
        }
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
}
