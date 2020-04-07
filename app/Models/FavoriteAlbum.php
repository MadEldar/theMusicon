<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavoriteAlbum extends Model
{
    public $timestamps = false;
    protected $table = 'favorite_albums';
    protected $fillable = [
        'user_id',
        'album_id'
    ];

    public function User() {
        return $this->belongsTo('\App\User');
    }
}
