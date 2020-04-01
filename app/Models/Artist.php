<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $table = 'artists';
    protected $fillable = [
        'artist_name',
        'artist_description',
        'artist_thumbnail',
        'career_start',
        'career_end'
    ];

    public function Genre() {
        return $this->belongsTo('\App\Genre');
    }

    public function Albums() {
        return $this->hasMany('\App\Album');
    }

    public function Songs() {
        return $this->hasMany('\App\Song');
    }

    public function FollowCount() {
        return ArtistFollower::where('artist_id', $this->id)->count();
    }
}
