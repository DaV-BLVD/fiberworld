<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FaqCategory;

class Faq extends Model
{
    protected $fillable = ['faq_category_id', 'question', 'answer', 'order'];

    // Each FAQ belongs to one category
    public function category()
    {
        return $this->belongsTo(FaqCategory::class, 'faq_category_id');
    }
}
