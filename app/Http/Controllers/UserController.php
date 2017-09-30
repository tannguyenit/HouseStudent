<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository\PostRepository;
use App\Repositories\UserRepository\UserRepository;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    protected $postRepository;
    protected $userRepository;

    public function __construct(
        PostRepository $postRepository,
        UserRepository $userRepository
    ) {
        $this->postRepository = $postRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $slug)
    {
        $getSortBy         = $request->get('sortby');
        $sortBy            = $this->typeRepository->getSortBy($getSortBy);
        $detailsTypes      = $this->typeRepository->getDataBySlug($slug);
        $id                = $detailsTypes->id;
        $dataView['posts'] = $this->postRepository->getDataByColumn('type_id', $id, $sortBy, config('setting.limit.type'));

        if ($detailsTypes && $dataView['posts']) {
            $dataView['detailsTypes'] = $detailsTypes;

            return view('type.detail', $dataView);
        }

        return abort(404);
    }

    public function checkEmail(Request $request)
    {
        if ($request->ajax()) {
            $email = $request->email;
            $new   = $request->new;
            $id    = $request->id;

            return $this->checkByColumn($new, 'email', $email, $id);
        }
    }

    public function checkusername(Request $request)
    {
        if ($request->ajax()) {
            $username = $request->username;
            $new      = $request->new;
            $id       = $request->id;

            return $this->checkByColumn($new, 'username', $username, $id);
        }
    }

    public function checkByColumn($new, $column, $value, $id)
    {
        if ($new) {
            $checkColumn = $this->userRepository->checkExists($column, $value);

            if ($checkColumn) {
                return response()->json([
                    'result' => true,
                ]);
            }
        } else {
            $checkColumn = $this->userRepository->checkExists($column, $value, $id);

            if ($checkColumn) {
                return response()->json([
                    'result' => true,
                ]);
            }
        }

        return response()->json([
            'result' => false,
        ]);
    }
}
