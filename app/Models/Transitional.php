<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transitional extends Model
{
    protected $fillable = [
        'imageUrlTemp',
    ];
    public function avatar()
    {
        return $this ->hasOne(Avatar::class);
    }
}
