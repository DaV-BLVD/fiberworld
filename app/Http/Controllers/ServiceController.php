<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\WhyFiberWorldHome;
use App\Models\WhyFiberWorldBusiness;
use App\Models\HomeFaq;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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

        return view('frontend.index', compact('services', 'Services_name', 'whyChooseUs'));
    }

    public function homeInternet()
    {
        // Fetch the "home-internet" service with its active plans and features
        $service = Service::where('slug', 'home-internet')
            ->with([
                'plans' => function ($query) {
                    $query->where('is_active', true)->orderBy('sort_order');
                },
                'plans.features'
            ])
            ->firstOrFail();

        $items = WhyFiberWorldHome::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->get();

        $faqs = HomeFaq::where('is_active', 1)->get();

        return view('frontend.home_internet', compact('service', 'items', 'faqs'));
    }

    public function businessInternet()
    {
        // dd('here');
        $service = Service::where('slug', 'business-internet')
            ->with([
                'plans' => function ($query) {
                    $query->where('is_active', true)->orderBy('sort_order');
                },
                'plans.features'
            ])
            ->firstOrFail();

        $items = WhyFiberWorldBusiness::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('frontend.business_internet', compact('service', 'items'));
    }

    public function plans()
    {
        $service = Service::where('slug', 'home-internet')
            ->with([
                'plans' => function ($query) {
                    $query->where('is_active', true)->orderBy('sort_order');
                },
                'plans.features'
            ])
            ->firstOrFail();

        return view('frontend.home_internet', compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:services,slug',
            'hero_heading' => 'required'
        ]);
        Service::create($validated);
        // return redirect()->route('services.index')->with('success', 'Service created!');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        // $service = Service::where('slug', $slug)->with(['plans.features', 'features'])->firstOrFail();
        // return view('frontend.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        // return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:services,slug,' . $service->id
        ]);
        $service->update($validated);
        // return redirect()->route('services.index')->with('success', 'Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        // return redirect()->route('services.index')->with('success', 'Deleted!');
    }
}
