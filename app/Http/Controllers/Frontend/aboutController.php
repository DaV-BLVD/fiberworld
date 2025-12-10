<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Value;
use App\Models\AboutIntro;


class aboutController extends Controller
{
    public function index()
    {
        $values = Value::all();

        $about_intro = AboutIntro::with(['paragraphs' => function($q) {
            $q->orderBy('sort_order', 'asc');
        }])->first();

        return view('frontend.about', compact('values', 'about_intro'));
    }
}
