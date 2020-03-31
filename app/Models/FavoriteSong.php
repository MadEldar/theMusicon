<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavoriteSong extends Model
{
    public $timestamps = false;
    protected $table = 'favorite_songs';
    protected $fillable = [
        'user_id',
        'song_id'
    ];

    public function User() {
        return $this->belongsTo('\App\User');
    }

    public function Song() {
        return $this->belongsTo('\App\Song');
    }
}
