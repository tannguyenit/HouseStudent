<?php
namespace App\Repositories\UserRepository;

use App\Models\User;
use App\Repositories\BaseRepository;
use App\Repositories\UserRepository\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    public function model()
    {
        return User::class;
    }

    public function getDataByEmail($email)
    {
        if (empty($email)) {
            return false;
        }

        return $this->model->whereEmail($email)->first();
    }
}
