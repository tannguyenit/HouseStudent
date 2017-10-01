<?php
namespace App\Repositories\ImageRepository;

interface ImageRepositoryInterface
{
    public function deleteImage($postId, $image);

    public function addFile($filename, $id);
}
