<?php
namespace App\Repositories\TypeRepository;

use App\Models\Type;
use App\Repositories\BaseRepository;
use App\Repositories\TypeRepository\TypeRepositoryInterface;

class TypeRepository extends BaseRepository implements TypeRepositoryInterface
{

    public function model()
    {
        return Type::class;
    }

    public function getSimilarPost($id, $limit)
    {
        if (!$id || !$limit) {
            return false;
        }

        return $this->model->where('id', $id)->with(['posts' => function ($query) use ($limit) {
            $query->limit($limit);
        }])->first();
    }
}
