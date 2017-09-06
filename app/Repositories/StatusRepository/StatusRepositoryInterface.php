<?php
namespace App\Repositories\StatusRepository;

interface StatusRepositoryInterface
{
    public function getData($relationship = []);
}
