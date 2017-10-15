<?php
namespace App\Repositories\LikeRepository;

use App\Models\Like;
use App\Repositories\BaseRepository;
use App\Repositories\LikeRepository\LikeRepositoryInterface;

class LikeRepository extends BaseRepository implements LikeRepositoryInterface
{

    public function model()
    {
        return Like::class;
    }
}
