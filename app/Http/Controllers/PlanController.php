<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\PlansandPricingWhyFiberWorld;
use App\Models\PlansandPricingFaq;
use App\Models\Service;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Home Internet Service
        $homeService = Service::where('slug', 'home-internet')
            ->where('is_active', true)
            ->with([
                'plans' => function ($q) {
                    $q->where('is_active', true)->orderBy('sort_order');
                },
                'plans.features'
            ])
            ->first();

        // Business Internet Service
        $businessService = Service::where('slug', 'business-internet')
            ->where('is_active', true)
            ->with([
                'plans' => function ($q) {
                    $q->where('is_active', true)->orderBy('sort_order');
                },
                'plans.features'
            ])
            ->first();

        $items = PlansandPricingWhyFiberWorld::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->get();

        $faqs = PlansandPricingFaq::where('is_active', 1)->get();

        return view('frontend.plans', compact('homeService', 'businessService', 'items', 'faqs'));
    }




    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     $services = Service::all();
    //     return view('admin.plans.create', compact('services'));
    // }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'name' => 'required',
            'speed_mbps' => 'required|integer',
            'price' => 'required|numeric',
            'billing_period' => 'required',
        ]);

        Plan::create($validated);
        return redirect()->route('plans.index')->with('success', 'Plan created!');
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
    // public function edit(Plan $plan)
    // {
    //     $services = Service::all();
    //     return view('admin.plans.edit', compact('plan', 'services'));
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plan $plan)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'name' => 'required',
            'speed_mbps' => 'required|integer',
            'price' => 'required|numeric',
            'billing_period' => 'required',
        ]);

        $plan->update($validated);
        return redirect()->route('plans.index')->with('success', 'Plan updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plan $plan)
    {
        $plan->delete();
        return redirect()->route('plans.index')->with('success', 'Plan deleted!');
    }
}
