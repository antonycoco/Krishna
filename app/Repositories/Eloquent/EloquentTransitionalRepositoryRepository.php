<?php

namespace App\Repositories\Eloquent;

use App\TransitionalRepository;
use App\Repositories\Contracts\TransitionalRepositoryRepository;

use Kurt\Repoist\Repositories\Eloquent\AbstractRepository;

class EloquentTransitionalRepositoryRepository extends AbstractRepository implements TransitionalRepositoryRepository
{
    public function entity()
    {
        return TransitionalRepository::class;
    }
}
