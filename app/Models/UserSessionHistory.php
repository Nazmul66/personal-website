<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSessionHistory extends Model
{
    protected $table = 'user_session_histories';
    protected $fillable = [
        'user_id',
        'login_time',
        'logout_time',
        'admin_id'
    ];
}
