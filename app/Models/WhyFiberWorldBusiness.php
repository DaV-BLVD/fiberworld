<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyFiberWorldBusiness extends Model
{
    protected $table = 'why_fiber_world_business'; // table name

    protected $fillable = [
        'icon',
        'title',
        'description',
        'is_active',
        'sort_order',
    ];
}
