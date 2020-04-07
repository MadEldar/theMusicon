<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $table = 'tokens';
    protected $fillable = [
        'user_id',
        'token',
        'usage'
    ];

    const usages = [
        0 => 'verify',
        1 => 'reset_password'
    ];

    public function User() {
        return $this->belongsTo('\App\User');
    }
}
