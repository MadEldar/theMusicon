<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlaylistFollower extends Model
{
    public $timestamps = false;
    protected $table = 'playlist_followers';
    protected $fillable = [
        'playlist_id',
        'user_id'
    ];

    public function User() {
        return $this->belongsTo('\App\User');
    }
}
