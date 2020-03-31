<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'albums';
    protected $fillable = [
        'album_name',
        'genre_id',
        'artist_id',
        'album_status',
        'previous_status',
        'release_date'
    ];

    public function Genre() {
        return $this->belongsTo('\App\Genre');
    }

    public function Artist() {
        return $this->belongsTo('\App\Artist');
    }

    public function Songs() {
        return $this->hasMany('\App\Song');
    }

    public function FavoriteCount() {
        return FavoriteAlbum::where('album_id', $this->id)->count();
    }
}
