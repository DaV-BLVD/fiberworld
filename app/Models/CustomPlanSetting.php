<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomPlanSetting extends Model
{
    protected $fillable = [
        'speed_min',
        'speed_max',
        'speed_step',
        'data_min',
        'data_max',
        'data_step',
        'price_per_mbps',
        'price_per_gb',
        'unlimited_data_price',
        'is_active',
    ];
}
