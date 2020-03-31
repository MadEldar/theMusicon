<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genres';
    protected $fillable = [
        'genre_name',
        'genre_status'
    ];

    public function Artists() {
        return $this->hasMany('\App\Artist');
    }

    public function Albums() {
        return $this->hasMany('\App\Album');
    }

    public function Songs() {
        return $this->hasMany('\App\Song');
    }

    public function FollowCount() {
        return GenreFollower::where('genre_id', $this->id)->count();
    }
}
