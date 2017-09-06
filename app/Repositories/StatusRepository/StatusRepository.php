<?php
namespace App\Repositories\StatusRepository;

use App\Models\Status;
use App\Repositories\BaseRepository;
use App\Repositories\StatusRepository\StatusRepositoryInterface;

class StatusRepository extends BaseRepository implements StatusRepositoryInterface
{

    public function model()
    {
        return Status::class;
    }

    public function getData($relationship = [])
    {
        return $this->model->with($relationship)
            ->orderBy('created_at', 'DESC')
            ->paginate(config('setting.limit.similar_post'));
    }
}
