<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WhyFiberWorldDedicatedLeasedLine;

class dedicated_leased_lineController extends Controller
{
    public function index() {
        
        $items = WhyFiberWorldDedicatedLeasedLine::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('frontend.dedicated_leased_line', compact('items'));
    }
}
