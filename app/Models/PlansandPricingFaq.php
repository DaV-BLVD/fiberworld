<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlansandPricingFaq extends Model
{
    protected $table = 'plans_and_pricing_faq'; // table name

    protected $fillable = [
        'question',
        'answer',
        'is_active',
        'sort_order',
    ];
}
