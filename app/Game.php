<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $hidden = [
        'id'
    ];

    public function scopeRateDescending($query)
    {
        return $query->orderBy('rate','DESC');
    } 

    public function scopeIdDescending($query)
    {
        return $query->orderBy('id','DESC');
    }  

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function records()
    {
        return $this->hasMany(Record::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
