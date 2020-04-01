<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $table = 'songs';
    protected $fillable = [
        'song_name',
        'song_lyrics',
        'genre_id',
        'artist_id',
        'album_id',
        'song_ordinal',
        'song_status',
        'previous_status',
        'release_date'
    ];

    public function Genre() {
        return $this->belongsTo('\App\Genre');
    }

    public function Artist() {
        return $this->belongsTo('\App\Artist');
    }

    public function Album() {
        return $this->belongsTo('\App\Album');
    }

    public function Playlists() {
        return $this->hasMany('\App\PlaylistSong');
    }

    public function Comments() {
        return $this->hasMany('\App\Comments');
    }

    public function FavoriteCount() {
        return FavoriteSong::where('song_id', $this->id)->count();
    }
}
