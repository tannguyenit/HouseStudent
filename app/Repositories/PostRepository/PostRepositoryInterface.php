<?php
namespace App\Repositories\PostRepository;

interface PostRepositoryInterface
{
    public function getAllData($search, $sortBy, $array = []);

    public function getPost($limit, $array = [], $orderBy = null);

    public function getCountry();

    public function getDataBySlug($slug);

    public function getDataByColumn($column, $id, $sortBy, $limit);

    public function getMyProperties($relationship, $column, $id, $sortBy, $limit);

    public function getDataDistinct($column, $parentColunm);

    public function getPrice();

    public function changePrice($value);

    public function getDataSearch($search);

    public function getAllDatasAdmin($relationship, $limit);

    public function deletePost($id);
}
