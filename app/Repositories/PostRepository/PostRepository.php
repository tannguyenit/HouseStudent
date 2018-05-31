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
            ->active()
            ->where($arrWhere)
            ->whereBetween('price', [$min_price, $max_price]);

        if ($keyword) {
            $result->where('address', 'LIKE', $keyword);
        }

        if (isset($search['min_area']) && "" != $search['min_area']) {
            $result->where('area', '>', $search['min_area']);
        }

        if (isset($search['max_area']) && "" != $search['max_area']) {
            $result->where('area', '<', $search['max_area']);
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
            ->active()
            ->limit($limit)
            ->orderBy($orderBy, 'DESC')
            ->get();
    }

    public function getCountry()
    {
        return $this->model->select(DB::raw('count(township) as total, township'))
            ->groupBy('township')
            ->orderBy('total', 'DESC')
            ->active()
            ->limit(config('setting.limit.country'))
            ->get();
    }

    public function getDataBySlug($slug, $array = [])
    {
        if (!empty($slug)) {
            return $this->model->active()
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
            ->active()
            ->paginate($limit);
    }

    public function getMyProperties($relationship, $column, $id, $sortBy, $limit, $public)
    {
        if (empty($id) || empty($column)) {
            return false;
        }
        if ($public) {
            $query = $this->model;
        } else {
            $query = $this->model->active();
        }

        return $query->where($column, $id)
            ->orderBy($sortBy->key, $sortBy->value)
            ->with($relationship)
            ->paginate($limit);
    }

    public function getDataDistinct($column, $parentColumn)
    {
        if ($column) {
            return $this->model->select($column, $parentColumn)
                ->distinct()
                ->active()
                ->get();
        }

        if ($parentColumn) {
            return $this->model->groupBy($parentColumn)
                ->active()
                ->select($parentColumn)
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

        if (isset($search['bedrooms'])) {
            $arrWhere['bedrooms'] = $search['bedrooms'];
        }

        if (isset($search['bathrooms'])) {
            $arrWhere['bathrooms'] = $search['bathrooms'];
        }

        return $arrWhere;
    }

    public function getAllDatasAdmin($relationship, $limit)
    {
        return $this->model->with($relationship)->orderBy('updated_at', 'DESC')->paginate($limit);
    }

    public function deletePost($id)
    {
        DB::beginTransaction();
        try {
            $relationship = ['images', 'features'];
            $post         = $this->model->with($relationship)->find($id);
            $result       = true;

            if (count($post->features)) {
                if (!$post->features()->delete()) {
                    $result = false;
                }
            }

            if (count($post->images)) {
                if (!$post->images()->delete()) {
                    $result = false;
                }
            }

            if ($result && $post->delete()) {
                DB::commit();
            }

            return $result;
        } catch (Exception $e) {
            DB::rollBack();
        }
    }
}
