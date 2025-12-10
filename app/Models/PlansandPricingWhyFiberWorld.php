<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlansandPricingWhyFiberWorld extends Model
{
    protected $table = 'plans_and_pricing_why_fiber_world'; // table name

    protected $fillable = [
        'icon',
        'title',
        'description',
        'is_active',
        'sort_order',
    ];
}
