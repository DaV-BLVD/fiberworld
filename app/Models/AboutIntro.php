<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutIntro extends Model
{
    protected $table = 'about_intro';

    protected $fillable = [
        'title'
    ];

    public function paragraphs()
    {
        return $this->hasMany(AboutIntroParagraph::class)->orderBy('sort_order', 'asc');
    }
}
