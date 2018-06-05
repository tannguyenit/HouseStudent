<?php
namespace App\Repositories\CategoryRepository;

interface CategoryRepositoryInterface
{
    public function getSimilarPost($id, $limit);

    public function getData($relationship = []);
}
