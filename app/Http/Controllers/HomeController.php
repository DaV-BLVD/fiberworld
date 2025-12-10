<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeroSlider;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\CustomPlanSetting;
use App\Models\District;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // hero slides
        $slides = HeroSlider::all(); // Fetch all slides from DB

        // Fetch services from the database
        $services = Service::where('slug', 'home-internet')
            ->where('is_active', true)
            ->with(['plans.features'])
            ->orderBy('sort_order')
            ->get();

        // for the index page services' list
        $Services_name = Service::where('is_active', true)
            ->orderBy('sort_order')
            ->get(['name', 'hero_subtitle', 'slug']); // only select what you need

        $testimonials = Testimonial::where('is_active', 1)
            ->orderBy('sort_order', 'asc')
            ->get();

        $customPlanService = Service::where('slug', 'custom-service')->first();

        $customPlan = CustomPlanSetting::where('is_active', 1)->first();

        if (!$customPlan) {
        // Fallback if no active plan is set
        abort(404, 'No active custom plan found.');
    }
    
        $Services_name = Service::all();
        $slides = HeroSlider::all();

        $districts = District::with('areas')->get();

        return view('frontend.index', compact('services', 'Services_name', 'slides', 'testimonials', 'customPlan', 'customPlanService', 'districts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
