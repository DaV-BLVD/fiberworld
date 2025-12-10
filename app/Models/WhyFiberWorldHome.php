<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyFiberWorldHome extends Model
{
    protected $table = 'why_fiber_world_home'; // table name

    protected $fillable = [
        'icon',
        'title',
        'description',
        'is_active',
        'sort_order',
    ];
}
