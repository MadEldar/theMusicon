<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';
    protected $fillable = [
        'noti_content',
        'noti_thumbnail',
        'user_id'
    ];

    public function User() {
        return $this->belongsTo('\App\User');
    }
}
