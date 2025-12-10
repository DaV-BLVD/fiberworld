<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\PlanFeature;
use Illuminate\Http\Request;

class HomePlanController extends Controller
{
    // SHOW ALL PLANS
    public function index()
    {
        $plans = Plan::where('service_id', 1)->with('features')->get(); // Service 1 = Home Internet
        return view('admin.services.home.index', compact('plans'));
    }

    // CREATE FORM
    public function create()
    {
        return view('admin.services.home.create');
    }

    // STORE NEW PLAN + FEATURES
    public function store(Request $request)
    {
        $plan = Plan::create([
            'service_id' => 1, // Home Internet
            'name' => $request->name,
            'speed_mbps' => $request->speed_mbps,
            'speed_unit' => $request->speed_unit,
            'price' => $request->price,
            'currency' => $request->currency,
            'billing_period' => $request->billing_period,
            'is_recommended' => $request->is_recommended ? 1 : 0,
            'is_active' => $request->is_active ? 1 : 0,
            'sort_order' => $request->sort_order,
        ]);

        if ($request->features) {
            foreach ($request->features as $index => $text) {
                PlanFeature::create([
                    'plan_id' => $plan->id,
                    'feature_text' => $text,
                    'is_available' => $request->is_available[$index] ?? 0
                ]);
            }
        }

        return redirect()->route('admin.services.home.index')->with('success', 'Plan created!');
    }

    // EDIT FORM
    public function edit(Plan $plan)
    {
        $plan->load('features');
        return view('admin.services.home.edit', compact('plan'));
    }

    // UPDATE PLAN + FEATURES
    public function update(Request $request, Plan $plan)
    {
        $plan->update([
            'name' => $request->name,
            'speed_mbps' => $request->speed_mbps,
            'speed_unit' => $request->speed_unit,
            'price' => $request->price,
            'currency' => $request->currency,
            'billing_period' => $request->billing_period,
            'is_recommended' => $request->is_recommended ? 1 : 0,
            'is_active' => $request->is_active ? 1 : 0,
            'sort_order' => $request->sort_order ?? $plan->sort_order ?? 0, // <── FIX
        ]);

        // DELETE OLD FEATURES
        $plan->features()->delete();

        // ADD NEW FEATURES
        if ($request->features) {
            foreach ($request->features as $index => $text) {
                PlanFeature::create([
                    'plan_id' => $plan->id,
                    'feature_text' => $text,
                    'is_available' => $request->is_available[$index] ?? 0
                ]);
            }
        }

        return redirect()->route('admin.services.home.index')->with('success', 'Plan updated!');
    }

    // DELETE PLAN
    public function destroy(Plan $plan)
    {
        $plan->delete();
        return back()->with('success', 'Plan deleted!');
    }
}

