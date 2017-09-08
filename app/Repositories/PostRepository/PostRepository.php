<?php
namespace App\Repositories\PostRepository;

use App\Models\Post;
use App\Repositories\BaseRepository;
use App\Repositories\PostRepository\PostRepositoryInterface;
use DB;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{

    public function model()
    {
        return Post::class;
    }

    public function getAllData($array = [])
    {
        return $this->model->with($array)->get();
    }

    /**
     * @param number limit
     * @param array relationship
     * @param string orderby
     * @return array
     */
    public function getPost($limit, $array = [], $orderBy = null)
    {
        if (empty($orderBy)) {
            $orderBy = 'created_at';
        }

        return $this->model->with($array)
            ->limit($limit)
            ->orderBy($orderBy, 'DESC')
            ->get();
    }

    public function getCountry()
    {
        return $this->model->select(DB::raw('count(township) as total, township'))
            ->groupBy('township')
            ->orderBy('total', 'DESC')
            ->limit(config('setting.limit.country'))
            ->get();
    }

    public function getDataBySlug($slug, $array = [])
    {
        if (!empty($slug)) {
            return $this->model->where('slug', $slug)
                ->with($array)
                ->first();
        }

        return false;
    }

    public function getDataByColumn($column, $id, $sortBy = '')
    {
        if (empty($id) || empty($column)) {
            return false;
        }

        if (!$sortBy) {
            $sortBy = [
                'key'   => 'created_at',
                'value' => 'DESC',
            ];

            $sortBy = (object) $sortBy;
        }

        return $this->model->where($column, $id)
            ->orderBy($sortBy->key, $sortBy->value)
            ->paginate(config('setting.limit.type'));
    }
}
