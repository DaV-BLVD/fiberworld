<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyFiberWorldDedicatedLeasedLine extends Model
{
    protected $table = 'why_fiber_world_dedicated_leased_line'; // table name

    protected $fillable = [
        'icon',
        'title',
        'description',
        'is_active',
        'sort_order',
    ];
}
