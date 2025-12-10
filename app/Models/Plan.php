<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'service_id',
        'name',
        'speed_mbps',
        'speed_unit',
        'price',
        'currency',
        'billing_period',
        'is_recommended',
        'is_active',
        'sort_order'
    ];

    // Relationship: Plan belongs to a service
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    // Relationship: Plan has many plan features
    public function features()
    {
        return $this->hasMany(PlanFeature::class);
    }
}
