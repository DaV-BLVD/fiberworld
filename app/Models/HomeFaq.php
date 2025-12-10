<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeFaq extends Model
{
    protected $table = 'home_internet_faq'; // table name

    protected $fillable = [
        'question',
        'answer',
        'is_active',
        'sort_order',
    ];
}
