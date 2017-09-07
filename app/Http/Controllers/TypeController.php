<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository\PostRepository;
use App\Repositories\TypeRepository\TypeRepository;
use Illuminate\Http\Request;

class TypeController extends BaseController
{
    protected $postRepository;
    protected $typeRepository;

    public function __construct(
        PostRepository $postRepository,
        TypeRepository $typeRepository
    ) {
        $this->postRepository = $postRepository;
        $this->typeRepository = $typeRepository;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $slug)
    {
        $getSortBy = $request->get('sortby');

        switch ($getSortBy) {
            case 'a_price':
                $sortBy = [
                    'key'   => 'price',
                    'value' => 'ASC',
                ];
                break;
            case 'd_price':
                $sortBy = [
                    'key'   => 'price',
                    'value' => 'DESC',
                ];
                break;
            case 'a_date':
                $sortBy = [
                    'key'   => 'created_at',
                    'value' => 'ASC',
                ];
                break;
            case 'd_date':
                $sortBy = [
                    'key'   => 'created_at',
                    'value' => 'DESC',
                ];
                break;

            default:
                $sortBy = [
                    'key'   => 'created_at',
                    'value' => 'DESC',
                ];
                break;
        }
        $sortBy            = (object) $sortBy;
        $detailsTypes      = $this->typeRepository->getDataBySlug($slug);
        $id                = $detailsTypes->id;
        $dataView['posts'] = $this->postRepository->getDataByColumn('type_id', $id, $sortBy);

        if ($detailsTypes && $dataView['posts']) {
            $dataView['detailsTypes'] = $detailsTypes;

            return view('type.detail', $dataView);
        }

        return abort(404);
    }
}
