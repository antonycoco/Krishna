<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    protected $fillable = [
        'imageUrl',
    ];

    public function transitional()
    {
        return $this->belongsTo(Transitional::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
