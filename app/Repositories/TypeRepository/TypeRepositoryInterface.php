<?php
namespace App\Repositories\TypeRepository;

interface TypeRepositoryInterface
{
    public function getSimilarPost($id, $limit);

    public function getData($relationship = []);
}
