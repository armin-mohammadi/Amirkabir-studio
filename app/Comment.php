<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
    	'text', 'rate'
    ];

    protected $hidden = [
        'id', 'email', 'user_id', 'game_id', 'created_at', 'updated_at'
    ];

    public function scopeDateDescending($query)
    {
        return $query->orderBy('date','DESC');
    } 

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
