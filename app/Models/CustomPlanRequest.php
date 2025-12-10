<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomPlanRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'speed',
        'data_limit',
        'unlimited_data',
        'email',
        'phone',
        'calculated_price',
        'status',
    ];
}
