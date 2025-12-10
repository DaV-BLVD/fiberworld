<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'hero_image_url',
        'hero_heading',
        'hero_subtitle',
        'icon_class',
        'short_description',
        'full_description',
        'is_active',
        'sort_order'
    ];

    // Relationship: A service has many plans
    public function plans()
    {
        return $this->hasMany(Plan::class);
    }

    // Relationship: A service has many service features
    public function features()
    {
        return $this->hasMany(ServiceFeature::class);
    }
}
