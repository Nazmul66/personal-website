<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    public function features()
    {
        return $this->hasMany(PricingFeature::class);
    }
}
