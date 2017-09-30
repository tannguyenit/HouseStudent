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

    public function getAllData($search, $sortBy, $array = [])
    {
        $getPrice = $this->getPrice();

        if (isset($search['min_price']) && strpos($search['min_price'], ',')) {
            $minPrice = $this->changePrice($search['min_price']);
        } else {
            $minPrice = $getPrice->min;
        }

        if (isset($search['max_price']) && strpos($search['max_price'], ',')) {
            $maxPrice = $this->changePrice($search['max_price']);
        } else {
            $maxPrice = $getPrice->max;
        }

        $arrWhere  = [];
        $arrWhere  = $this->getDataSearch($search);
        $min_price = $minPrice;
        $max_price = $maxPrice;
        $keyword   = isset($search['keyword']) ? '%' . $search['keyword'] . '%' : '';
        $result    = $this->model->with($array)
            ->where('status', config('setting.active'))
            ->where($arrWhere)
            ->whereBetween('price', [$min_price, $max_price]);

        if ($keyword) {
            $result->where('address', 'LIKE', $keyword);
        }

        return $result->orderBy($sortBy->key, $sortBy->value);
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
            ->where('status', config('setting.active'))
            ->limit($limit)
            ->orderBy($orderBy, 'DESC')
            ->get();
    }

    public function getCountry()
    {
        return $this->model->select(DB::raw('count(township) as total, township'))
            ->groupBy('township')
            ->orderBy('total', 'DESC')
            ->where('status', config('setting.active'))
            ->limit(config('setting.limit.country'))
            ->get();
    }

    public function getDataBySlug($slug, $array = [])
    {
        if (!empty($slug)) {
            return $this->model->where('status', config('setting.active'))
                ->where('slug', $slug)
                ->with($array)
                ->first();
        }

        return false;
    }

    public function getDataByColumn($relationship, $column, $id, $sortBy, $limit = '')
    {
        if (empty($id) || empty($column)) {
            return false;
        }

        if (empty($limit)) {
            $limit = 1;
        }

        return $this->model->where($column, $id)
            ->orderBy($sortBy->key, $sortBy->value)
            ->with($relationship)
            ->where('status', config('setting.active'))
            ->paginate($limit);
    }

    public function getDataDistinct($column, $parentColumn)
    {
        if ($column && $parentColumn) {
            return $this->model->groupBy($column, $parentColumn)
                ->where('status', config('setting.active'))
                ->select($column, $parentColumn)
                ->get();
        }

        return false;
    }

    public function getPrice()
    {
        $min = $this->model->min('price');
        $max = $this->model->max('price');

        $price = [
            'min' => isset($min) ? $min : 0,
            'max' => isset($max) ? $max : 0,
        ];

        return (object) $price;
    }

    public function changePrice($value)
    {
        if ($value) {
            $price = explode('$', $value)[1];
            return str_replace(',', '', $price);
        }

        return 0;
    }

    public function getDataSearch($search)
    {
        $arrWhere = [];

        if (isset($search['location']) && 'all' != $search['location']) {
            $arrWhere['township'] = $search['location'];
        }

        if (isset($search['area']) && 'all' != $search['area']) {
            $arrWhere['country'] = $search['area'];
        }

        if (isset($search['status']) && 'all' != $search['status']) {
            $arrWhere['status_id'] = $search['status'];
        }

        if (isset($search['type']) && 'all' != $search['type']) {
            $arrWhere['type_id'] = $search['type'];
        }

        return $arrWhere;
    }
}
