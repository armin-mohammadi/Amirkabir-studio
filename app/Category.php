<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $hidden = [
        'id', 'created_at', 'updated_at'
    ];

    public function games()
    {
        return $this->belongsToMany(Game::class);
    }
}
