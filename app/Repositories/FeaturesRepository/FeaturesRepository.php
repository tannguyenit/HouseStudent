<?php
namespace App\Repositories\FeaturesRepository;

use App\Models\Features;
use App\Repositories\BaseRepository;
use App\Repositories\FeaturesRepository\FeaturesRepositoryInterface;
use DB;

class FeaturesRepository extends BaseRepository implements FeaturesRepositoryInterface
{

    public function model()
    {
        return Features::class;
    }

    public function deleteByColum($column, $value)
    {

        DB::beginTransaction();

        try {
            $result = $this->model->where($column, $value)->delete();
        } catch (Exception $e) {
            DB::rollBack();
        }

        DB::commit();

        return $result;
    }
}
