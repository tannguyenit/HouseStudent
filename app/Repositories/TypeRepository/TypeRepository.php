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

        return $this->model->where('id', $id)
            ->with(['posts' => function ($query) use ($limit) {
                $query->limit($limit);
            }])->first();
    }

    public function getData($relationship = [])
    {
        return $this->model->with($relationship)
            ->orderBy('created_at', 'DESC')
            ->paginate(config('setting.limit.similar_post'));
    }
}
