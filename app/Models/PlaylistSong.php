<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaylistSong extends Model
{
    public $timestamps = false;
    protected $table = 'playlist_songs';
    protected $fillable = [
        'playlist_id',
        'song_id'
    ];

    public function Playlist() {
        return $this->belongsTo('\App\Playlist');
    }

    public function Song() {
        return $this->belongsTo('\App\Song');
    }
}
