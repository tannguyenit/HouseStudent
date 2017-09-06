<?php

namespace App\Repositories;

use App\Repositories\BaseRepositoryInterface;
use Carbon\Carbon;
use DB;
use Exception;
use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements BaseRepositoryInterface
{
    /**
    var
     */
    protected $model;

    /**
     */
    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    public function makeModel()
    {
        $model = $this->app->make($this->model());
        if (!$model instanceof Model) {
            throw new Exception(trans('message.exceptions.not-instance', ['model' => $this->model()]));
        }
        return $this->model = $model;
    }

    public function getCurrentUser()
    {
        return Auth::user();
    }

    public function count()
    {
        return $this->model->count();
    }

    public function getFillable()
    {
        return $this->model->getFillable();
    }

    public function all($columns = ['*'])
    {
        return $this->model->all();
    }

    public function find($id, $columns = ['*'])
    {
        $data = $this->model->find($id);
        if (empty($data)) {
            throw new Exception(trans('message.not_found'));
        }
        return $data;
    }

    public function findBy($column, $option)
    {
        $data = $this->model->where($column, $option)->get();
        return $data;
    }

    public function findByFirst($column, $option)
    {
        $data = $this->model->where($column, $option)->first();

        return $data;
    }

    public function whereIn($column, $array)
    {
        $data = $this->model->whereIn($column, $array);
        return $data;
    }

    public function paginate($limit = null, $columns = ['*'])
    {
        return $this->model->paginate($limit);
    }

    public function create($inputs)
    {
        return $this->model->create($inputs);
    }

    public function insert($inputs)
    {
        $now = Carbon::now();
        foreach ($inputs as $input) {
            $input['created_at'] = $now;
            $input['updated_at'] = $now;
        }
        return $this->model->insert($inputs);
    }

    public function update($inputs, $id)
    {
        DB::beginTransaction();
        try {
            $data = $this->model->where('id', $id)->update($inputs);
        } catch (Exception $e) {
            DB::rollBack();
        }
        DB::commit();
        return $data;
    }

    public function delete($ids)
    {
        DB::beginTransaction();
        try {
            $data = $this->model->destroy($ids);
            if (empty($data)) {
                throw new Exception(trans('message.delete_error'));
            }
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();

        return $data;
    }

    public function search($column, $value)
    {
        return $this->model->where('$column LIKE $value');
    }

    public function store($input)
    {
        $data = $this->model->create($input);
        if (empty($data)) {
            throw new Exception(trans('message.create_error'));
        }
        return $data;
    }

    public function show($id = null)
    {
        $data = $this->model->find($id);
        if (empty($data)) {
            throw new Exception(trans('message.not_found'));
        }
        return $data;
    }

    public function uploadImage($image, $path)
    {
        if (empty($path) || empty($image)) {
            return false;
        }
        $imageName = time() . '-' . $image->getClientOriginalName();
        $path      = public_path() . $path;
        $image->move($path, $imageName);
        return $imageName;
    }

    public function getStatistic()
    {
        $day   = $this->model->whereDay('created_at', date('d'))->count();
        $month = $this->model->whereMonth('created_at', date('m'))->count();
        $year  = $this->model->whereYear('created_at', date('Y'))->count();
        $total = $this->model->count();

        return (object) [
            'day'   => $day,
            'month' => $month,
            'year'  => $year,
            'total' => $total,
        ];
    }
}
