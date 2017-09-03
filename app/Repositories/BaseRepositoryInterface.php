<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    public function all($columns = ['*']);

    public function find($id, $columns = ['*']);

    public function findByFirst($id, $columns);

    public function paginate($limit = null, $columns = ['*']);

    public function create($input);

    public function update($input, $id);

    public function delete($id);

    public function uploadImage($image, $path);
}
