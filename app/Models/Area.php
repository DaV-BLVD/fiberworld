<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = ['district_id', 'area_name', 'latitude', 'longitude'];

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
