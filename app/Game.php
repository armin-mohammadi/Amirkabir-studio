<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Game extends Model
{
    protected $hidden = [
        'id', 'created_at', 'updated_at'
    ];

    public function scopeRateDescending($query)
    {
        return $query->join('comments', 'games.id', '=', 'comments.game_id')
            ->select(array('games.*', DB::raw('ROUND(AVG(rate), 1) as rate'), DB::raw('COUNT(*) as number_of_comments')))
            ->groupBy('id')
            ->orderBy('rate', 'DESC');
    } 

    public function scopeIdDescending($query)
    {
        return $query->join('comments', 'games.id', '=', 'comments.game_id')
            ->select(array('games.*', DB::raw('ROUND(AVG(rate), 1) as rate'), DB::raw('COUNT(*) as number_of_comments')))
            ->groupBy('id')
            ->orderBy('id', 'DESC');
    } 

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('date', 'DESC');
    }

    public function records()
    {
        return $this->hasMany(Record::class)->orderBy('score', 'DESC')->take(10);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
