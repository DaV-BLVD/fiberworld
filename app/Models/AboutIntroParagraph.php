<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutIntroParagraph extends Model
{
    protected $table = "about_intro_paragraphs";

    protected $fillable = [
        'about_intro_id',
        'paragraph',
        'sort_order'
    ];

    public function aboutIntro()
    {
        return $this->belongsTo(AboutIntro::class, 'about_intro_id');
    }
}
