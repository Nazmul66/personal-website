<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function plan()
    {
        return $this->belongsTo(Pricing::class, 'plan_id', 'id');
    }
    public function userPlan()
    {
        return $this->belongsTo(UserPlans::class, 'user_plan_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
