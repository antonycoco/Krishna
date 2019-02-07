<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Avatar;
use App\Repositories\Contracts\AvatarRepository;

use Kurt\Repoist\Repositories\Eloquent\AbstractRepository;

class EloquentAvatarRepository extends AbstractRepository implements AvatarRepository
{
    public function entity()
    {
        return Avatar::class;
    }
}
