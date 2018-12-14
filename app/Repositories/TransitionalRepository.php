<?php

namespace App\Repositories;

use App\Models\Transitional;

class TransitionalRepository extends BaseRepository
{
    public function __construct(Transitional $transitional)
    {
        $this->model = $transitional;
    }
}
