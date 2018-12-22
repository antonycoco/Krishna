<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    protected $fillable = [
        'imageUrl','imageValider',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
