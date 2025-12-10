<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Area;
use Illuminate\Http\Request;

class coverageController extends Controller
{
    public function index()
    {
        $districts = District::with('areas')->get();

        // Pass to Blade
        return view('frontend.coverage', compact('districts'));
    }

}
