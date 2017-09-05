<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository\PostRepository;
use Illuminate\Http\Request;

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
            $data = $this->postRepository->getAllData(['user']);

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
}
