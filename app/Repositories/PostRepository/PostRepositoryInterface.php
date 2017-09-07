<?php
namespace App\Repositories\PostRepository;

interface PostRepositoryInterface
{
    public function getAllData();

    public function getPost($limit, $array = [], $orderBy = null);

    public function getCountry();

    public function getDataBySlug($slug);

    public function getDataByColumn($column, $id);
}
