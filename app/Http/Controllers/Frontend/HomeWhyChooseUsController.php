<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WhyChooseUsHome;


class HomeWhyChooseUsController extends Controller
{
    public function index()
    {
        // Fetch all active features ordered by sort_order
        $whyChooseUs = WhyChooseUsHome::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('frontend.home_internet', compact('whyChooseUs'));
    }
}
