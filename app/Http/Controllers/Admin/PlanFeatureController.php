<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\PlanFeature;
use Illuminate\Http\Request;

class PlanFeatureController extends Controller
{
    public function index(Plan $plan)
    {
        $features = $plan->features;
        return view('admin.plan_features.index', compact('plan', 'features'));
    }

    public function create(Plan $plan)
    {
        return view('admin.plan_features.create', compact('plan'));
    }

    public function store(Request $request, Plan $plan)
    {
        $request->validate([
            'feature_text' => 'required|string|max:255',
            'is_available' => 'boolean'
        ]);

        $plan->features()->create([
            'feature_text' => $request->feature_text,
            'is_available' => $request->has('is_available')
        ]);

        return redirect()->route('admin.plans.features.index', $plan->id)
            ->with('success', 'Feature added successfully.');
    }

    public function edit(Plan $plan, PlanFeature $feature)
    {
        return view('admin.plan_features.edit', compact('plan', 'feature'));
    }

    public function update(Request $request, Plan $plan, PlanFeature $feature)
    {
        $request->validate([
            'feature_text' => 'required|string|max:255',
            'is_available' => 'boolean'
        ]);

        $feature->update([
            'feature_text' => $request->feature_text,
            'is_available' => $request->has('is_available')
        ]);

        return redirect()->route('admin.plans.features.index', $plan->id)
            ->with('success', 'Feature updated successfully.');
    }

    public function destroy(Plan $plan, PlanFeature $feature)
    {
        $feature->delete();
        return redirect()->route('admin.plans.features.index', $plan->id)
            ->with('success', 'Feature deleted successfully.');
    }

    // Optional toggle for AJAX
    public function toggle(Plan $plan, PlanFeature $feature)
    {
        $feature->is_available = !$feature->is_available;
        $feature->save();

        return response()->json([
            'success' => true,
            'is_available' => $feature->is_available
        ]);
    }
}
