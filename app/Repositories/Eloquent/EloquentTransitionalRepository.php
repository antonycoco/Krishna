<?php

namespace App\Repositories\Eloquent;

use App\TransitionalRepository;
use App\Repositories\Contracts\TransitionalRepository;

use Kurt\Repoist\Repositories\Eloquent\AbstractRepository;

class EloquentTransitionalRepository extends AbstractRepository implements TransitionalRepository
{
    public function entity()
    {
        return TransitionalRepository::class;
    }
}
