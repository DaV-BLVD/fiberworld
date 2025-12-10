<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Faq;

class FaqCategory extends Model
{
    protected $fillable = ['name', 'slug'];

    // A category has many FAQs
    public function faqs()
    {
        return $this->hasMany(Faq::class)->orderBy('order');
    }
}
