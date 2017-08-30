<?php
namespace App\Repositories\PostRepository;

interface PostRepositoryInterface
{
    public function getAllData();
    public function getPost($limit, $array = [], $orderBy = null);
    public function getCountry();
}
