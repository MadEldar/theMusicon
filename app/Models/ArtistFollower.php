<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtistFollower extends Model
{
    public $timestamps = false;

    protected $table = 'artist_followers';
    protected $fillable = [
        'user_id',
        'artist_id'
    ];

    public function User() {
        return $this->belongsTo('\App\User');
    }
}
