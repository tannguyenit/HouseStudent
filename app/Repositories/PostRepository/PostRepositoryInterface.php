<?php
namespace App\Repositories\PostRepository;

interface PostRepositoryInterface
{
    public function getAllData($search, $array = []);

    public function getPost($limit, $array = [], $orderBy = null);

    public function getCountry();

    public function getDataBySlug($slug);

    public function getDataByColumn($column, $id, $sortBy);

    public function getDataDistinct($column, $parentColunm);

    public function getPrice();

    public function changePrice($value);

    public function getDataSearch($search);
}
