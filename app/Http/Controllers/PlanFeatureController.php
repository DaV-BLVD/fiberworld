<?php

namespace App\Http\Controllers;

use App\Models\PlanFeature;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $features = PlanFeature::with('plan')->orderBy('id')->get();
        return view('admin.plan_features.index', compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $plans = Plan::all();
        return view('admin.plan_features.create', compact('plans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'plan_id' => 'required|exists:plans,id',
            'feature_text' => 'required',
            'is_available' => 'boolean',
        ]);

        PlanFeature::create($validated);
        return redirect()->route('plan-features.index')->with('success', 'Feature created!');
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
    public function edit(PlanFeature $planFeature)
    {
        $plans = Plan::all();
        return view('admin.plan_features.edit', compact('planFeature', 'plans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PlanFeature $planFeature)
    {
        $validated = $request->validate([
            'plan_id' => 'required|exists:plans,id',
            'feature_text' => 'required',
            'is_available' => 'boolean',
        ]);

        $planFeature->update($validated);
        return redirect()->route('plan-features.index')->with('success', 'Feature updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PlanFeature $planFeature)
    {
        $planFeature->delete();
        return redirect()->route('plan-features.index')->with('success', 'Feature deleted!');
    }
}
