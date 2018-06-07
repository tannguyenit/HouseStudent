<?php
namespace App\Repositories\CategoryRepository;

use App\Models\Category;
use App\Repositories\BaseRepository;
use App\Repositories\CategoryRepository\CategoryRepositoryInterface;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{

    public function model()
    {
        return Category::class;
    }

    public function getSimilarPost($id, $limit)
    {
        if (!$id || !$limit) {
            return false;
        }

        return $this->model->where('id', $id)
            ->with(['posts' => function ($query) use ($limit) {
                $query->with('firstImages', 'likes')->limit($limit);
            }])->first();
    }

    public function getData($relationship = [])
    {
        return $this->model->with($relationship)
            ->orderBy('created_at', 'DESC')
            ->paginate(config('setting.limit.similar_post'));
    }
}
