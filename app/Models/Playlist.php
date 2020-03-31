<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $table = 'playlists';
    protected $fillable = [
        'user_id',
        'songs_played',
        'seconds_played',
        'playlist_status',
        'previous_status'
    ];

    public function User() {
        return $this->belongsTo('\App\User');
    }

    public function Songs() {
        return $this->hasMany('\App\PlaylistSong');
    }

    public function FollowCount() {
        return PlaylistFollower::where('playlist_id', $this->id)->count();
    }
}
