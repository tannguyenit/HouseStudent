<?php
namespace App\Repositories\UserRepository;

interface UserRepositoryInterface
{
    public function getDataByEmail($email);
}
