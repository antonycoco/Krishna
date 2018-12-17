<?php

namespace App\Repositories;

use App\Models\Transitional;
use App\Models\Avatar;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;

class TransitionalRepository extends BaseRepository
{
    public function __construct(Transitional $transitional)
    {
        $this->model = $transitional;
    }
    public function store(array $request)
    {
        $path = basename($request->avatar->store('images/avatars_submit'));
        $avatar = new Avatar;
        $avatar->user_id = $request->user_id;
        $avatar->name = $path;
        $request->user()->transitional()->save($avatar);
    }
}
