<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\TypeRepository\TypeRepository;

class TypeController extends Controller
{
    protected $typeRepository;

    public function __construct(TypeRepository $typeRepository)
    {
        $this->typeRepository = $typeRepository;
    }

    public function index()
    {
        $relationship      = ['posts'];
        $dataView['types'] = $this->typeRepository->getData($relationship);

        return view('admin.type', $dataView);
    }
}
