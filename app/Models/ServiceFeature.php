<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceFeature extends Model
{
    protected $fillable = [
        'service_id',
        'title',
        'icon_class',
        'description',
        'sort_order'
    ];

    // Relationship: Service feature belongs to a service
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
