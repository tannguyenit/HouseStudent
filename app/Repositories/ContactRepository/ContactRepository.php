<?php
namespace App\Repositories\ContactRepository;

use App\Models\Contact;
use App\Repositories\BaseRepository;
use App\Repositories\ContactRepository\ContactRepositoryInterface;

class ContactRepository extends BaseRepository implements ContactRepositoryInterface
{

    public function model()
    {
        return Contact::class;
    }
}
