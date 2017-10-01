<?php
namespace App\Repositories\ImageRepository;

use App\Models\Image;
use App\Repositories\BaseRepository;
use App\Repositories\ImageRepository\ImageRepositoryInterface;
use DB;
use Exception;

class ImageRepository extends BaseRepository implements ImageRepositoryInterface
{

    public function model()
    {
        return Image::class;
    }

    public function deleteImage($postId, $image)
    {
        DB::beginTransaction();
        try {
            $data = $this->model->where('post_id', $postId)
                ->where('image', $image)->delete();
        } catch (Exception $e) {
            DB::rollBack();
        }
        DB::commit();

        return $data;
    }

    public function addFile($filename, $id)
    {
        if ($filename && $id) {
            $file      = time() . '-' . str_replace(' ', '-', $filename);
            $arrInsert = [
                'post_id' => $id,
                'image'   => $file,
            ];
            $result = $this->model->create($arrInsert);

            if ($result) {
                return $file;
            }
        }

        return false;
    }
}
