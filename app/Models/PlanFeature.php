<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanFeature extends Model
{
    protected $fillable = [
        'plan_id',
        'feature_text',
        'is_available'
    ];

    // Relationship: Plan feature belongs to a plan
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
