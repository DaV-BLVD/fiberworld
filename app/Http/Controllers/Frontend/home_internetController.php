<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\WhyChooseUsHome;

use Illuminate\Http\Request;

class home_internetController extends Controller
{
    public function index()
    {
        $whyChooseUs = WhyChooseUsHome::where('is_active', 1)
            ->orderBy('sort_order')
            ->get();

        return view('frontend.home_internet', compact('whyChooseUs'));
    }
}
