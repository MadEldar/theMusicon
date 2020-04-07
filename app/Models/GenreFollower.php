<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GenreFollower extends Model
{
    public $timestamps = false;
    protected $table = 'genre_followers';
    protected $fillable = [
        'genre_id',
        'user_id'
    ];

    public function User() {
        return $this->belongsTo('\App\User');
    }
}
