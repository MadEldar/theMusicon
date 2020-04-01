<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'comments';
    protected $fillable = [
        'user_id',
        'song_id',
        'comment_content',
        'comment_status',
        'previous_status'
    ];

    public function User() {
        return $this->belongsTo('\App\User');
    }

    public function Song() {
        return $this->belongsTo('App\Song');
    }
}
