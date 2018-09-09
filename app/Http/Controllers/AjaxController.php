<?php

namespace App\Http\Controllers;

use App\Repositories\ImageRepository\ImageRepositoryInterface;
use App\Repositories\LikeRepository\LikeRepositoryInterface;
use App\Repositories\PostRepository\PostRepositoryInterface;
use Illuminate\Http\Request;
use View;

class AjaxController extends BaseController
{
    protected $postRepository;
    protected $imageRepository;
    protected $likeRepository;
    protected $limit;

    /**
     * AjaxController constructor.
     * @param PostRepositoryInterface $postRepository
     * @param LikeRepositoryInterface $likeRepository
     * @param ImageRepositoryInterface $imageRepository
     */
    public function __construct(
        PostRepositoryInterface $postRepository,
        LikeRepositoryInterface $likeRepository,
        ImageRepositoryInterface $imageRepository
    ) {
        $this->postRepository  = $postRepository;
        $this->imageRepository = $imageRepository;
        $this->likeRepository  = $likeRepository;
        $this->limit           = config('setting.limit.news_post');
    }

    public function getMap(Request $request)
    {
        if ($request->ajax()) {
            $dataSearch   = $request->all();
            $sortBy       = $this->postRepository->getSortBy(null);
            $relationship = ['user', 'images', 'firstImages', 'category'];
            $data         = $this->postRepository->getAllData($dataSearch, $sortBy, $relationship)->get();

            if ($request->keyword) {
                $keyword = $request->keyword;
                return view('ajax.search-keyword', compact('data', 'keyword'));
            }

            if ($data) {
                $properties = [];

                foreach ($data as $element) {
                    $image        = isset($element->firstImages) ? $element->firstImages->image : config('path.no-image');
                    $properties[] = [
                        "id"           => $element->id,
                        "title"        => $element->title,
                        "lat"          => $element->lat,
                        "lng"          => $element->lng,
                        "address"      => $element->address,
                        "thumbnail"    => "<img width='385' height='258' src='{$image}' class='attachment-houzez-property-thumb-image size-houzez-property-thumb-image wp-post-image' sizes='(max-width: 385px) 100vw, 385px' />",
                        "url"          => action('PostController@show', $element->slug),
                        "prop_meta"    => "<p><span> " . trans('post.area') . ' ' . $element->area . "</span></p>",
                        "type"         => $element->user->username,
                        "images_count" => count($element->images),
                        "price"        => "<span class='item-price'>{$element->price}</span><span class='item-sub-price'>{$element->price} VND/tháng</span>",
                        "icon"         => url('/') . "/img/apartment-x1.png",
                        "retinaIcon"   => url('/') . "/img/apartment-x2.png",
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

    public function getSingleProperty(Request $request)
    {
        if ($request->ajax()) {
            $id           = $request->id;
            $relationship = ['user', 'firstImages', 'category'];
            $post         = $this->postRepository->find($id, $relationship);
            $firstImage   = isset($post->firstImages) ? $post->firstImages->image : config('path.no-image');

            if ($post) {
                $properties[] = [
                    'id'         => $post->id,
                    "title"      => $post->title,
                    "lat"        => $post->lat,
                    "lng"        => $post->lng,
                    "address"    => $post->address,
                    "thumbnail"  => "<img width='385' height='258' src='{$firstImage}' class='attachment-houzez-property-thumb-image size-houzez-property-thumb-image wp-post-image' sizes='(max-width: 385px) 100vw, 385px'/>",
                    "url"        => action('PostController@show', $post->slug),
                    "prop_meta"  => "<p><span>" . trans('post.area') . $post->area . "</span></p>",
                    "type"       => $post->category->title,
                    "price"      => '$' . $post->price,
                    "icon"       => url('/') . "/img/apartment-x1.png",
                    "retinaIcon" => url('/') . "/img/apartment-x2.png",
                ];

                return $this->success($properties);
            }

            return $this->notFound();
        }
    }

    public function like(Request $request)
    {
        if ($request->ajax()) {
            $data     = $request->all();
            $id       = $request->id;
            $variable = [
                'post_id' => $id,
                'user_id' => auth()->user()->id,
            ];
            $find               = $this->likeRepository->whereArray($variable);
            $post               = $this->postRepository->find($id);
            $variable['status'] = $request->status;

            if ($find) {
                if (config('setting.active') == $request->status) {
                    $type      = config('setting.no-active');
                    $active    = false;
                    $attribute = [
                        'total_like' => $post->total_like + 1,
                    ];
                } else {
                    $type      = config('setting.active');
                    $active    = true;
                    $attribute = [
                        'total_like' => $post->total_like - 1,
                    ];
                }

                $result = $this->likeRepository->update($variable, $find->id);
            } else {
                $result    = $this->likeRepository->create($variable);
                $attribute = [
                    'total_like' => $post->total_like + 1,
                ];
                $type   = config('setting.no-active');
                $active = false;
            }

            $updatePost = $this->postRepository->update($attribute, $id);

            if ($result && $updatePost) {
                return response()->json([
                    'status'     => true,
                    'type'       => $type,
                    'active'     => $active,
                    'total_like' => $attribute['total_like'] . trans('post.like'),
                ]);
            }
        }

        return response()->json([
            'status' => false,
            'title'  => trans('validate.errors'),
            'msg'    => trans('validate.msg.delete-fail'),
        ]);
    }

    public function loadMoreHomePage(Request $request)
    {
        if ($request->ajax()) {
            $limit = $request->get('limit');
            $post  = $this->postRepository->getNormalPost($limit);
            $data  = [
                'html'         => view('ajax.load-more', compact('post'))->render(),
                'hasMorePages' => $post->hasMorePages(),
                'nextPageUrl'  => $post->nextPageUrl(),
            ];

            return $this->success($data);
        }
    }

    public function changeStatusPin(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->id;

            if ($id) {
                $inputs = [
                    'pin' => config('setting.pin.waitting'),
                ];
                $updatePost = $this->postRepository->update($inputs, $id);

                if ($updatePost) {
                    $response = [
                        'title'  => trans('validate.success'),
                        'msg'    => trans('validate.msg.change-success'),
                        'result' => $id,
                    ];

                    return $this->success($response);
                }
            }
        }

        $response = [
            'title' => trans('validate.errors'),
            'msg'   => trans('validate.msg.change-fail'),
        ];

        return $this->error($response);
    }

    public function getPropertyViewed(Request $request)
    {
        if ($request->ajax()) {
            $ids         = $request->ids;
            $currentPost = $request->currentPost;
            $arrViewed   = $this->postRepository->whereIn('id', $ids)->get();
            $view        = view('post.post-viewed', compact('arrViewed', 'currentPost'))->render();

            return $this->success($view);
        }

        return abort(404);
    }
}
