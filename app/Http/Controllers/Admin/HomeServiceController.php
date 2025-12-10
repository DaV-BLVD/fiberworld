<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeServiceController extends Controller
{
    protected $serviceId;

    public function __construct()
    {
        $this->serviceId = Service::where('name', 'Home Internet')->first()->id;
    }

    public function index()
    {
        $plans = Plan::where('service_id', $this->serviceId)->orderBy('sort_order')->get();
        return view('admin.services.home.index', compact('plans'));
    }

    public function create()
    {
        return view('admin.services.home.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'speed_mbps' => 'required|numeric',
            'speed_unit' => 'required',
            'price' => 'required|numeric',
            'currency' => 'required',
            'billing_period' => 'required',
            'is_recommended' => 'boolean',
            'is_active' => 'boolean',
        ]);

        Plan::create([
            'service_id' => $this->serviceId,
            'name' => $request->name,
            'speed_mbps' => $request->speed_mbps,
            'speed_unit' => $request->speed_unit,
            'price' => $request->price,
            'currency' => $request->currency,
            'billing_period' => $request->billing_period,
            'is_recommended' => $request->is_recommended ?? 0,
            'is_active' => $request->is_active ?? 1,
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect()->route('admin.services.home.index')->with('success', 'Plan added successfully.');
    }

    public function edit(Plan $plan)
    {
        return view('admin.services.home.edit', compact('plan'));
    }

    public function update(Request $request, Plan $plan)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'speed_mbps' => 'required|numeric',
            'speed_unit' => 'required|string',
            'price' => 'required|numeric',
            'currency' => 'required|string',
            'billing_period' => 'required|string',
            'is_recommended' => 'boolean',
            'is_active' => 'boolean',
        ]);

        $plan->update([
            'name' => $request->name,
            'speed_mbps' => $request->speed_mbps,
            'speed_unit' => $request->speed_unit,
            'price' => $request->price,
            'currency' => $request->currency,
            'billing_period' => $request->billing_period,
            'is_recommended' => $request->has('is_recommended') ? 1 : 0,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->route('admin.services.home.index')->with('success', 'Plan updated successfully.');
    }

    public function destroy(Plan $plan)
    {
        $plan->delete();
        return redirect()->route('admin.services.home.index')->with('success', 'Plan deleted successfully.');
    }
}
