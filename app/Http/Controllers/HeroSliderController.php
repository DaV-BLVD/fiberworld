<?php

namespace App\Http\Controllers;

use App\Models\HeroSlider;

class HeroSliderController extends Controller
{
    public function index()
    {
        $slides = HeroSlider::all(); // Fetch all slides from DB
        return view('frontend.index', compact('slides'));
    }
}