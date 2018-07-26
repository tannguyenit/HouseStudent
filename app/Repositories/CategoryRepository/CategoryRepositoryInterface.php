<?php
namespace App\Repositories\CategoryRepository;

interface CategoryRepositoryInterface
{
    public function getSimilarPost($id, $limit);

    public function getData($relationship = []);

    public function getSortBy($getSortBy);

    public function getDataBySlug($slug);
}
