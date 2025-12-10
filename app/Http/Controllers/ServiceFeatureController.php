<?php

namespace App\Http\Controllers;

use App\Models\ServiceFeature;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $features = ServiceFeature::with('service')->orderBy('sort_order')->get();
        return view('admin.service_features.index', compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();
        return view('admin.service_features.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'title' => 'required',
            'description' => 'nullable',
            'sort_order' => 'nullable|integer',
        ]);

        ServiceFeature::create($validated);
        return redirect()->route('service-features.index')->with('success', 'Feature created!');
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
    public function edit(ServiceFeature $serviceFeature)
    {
        $services = Service::all();
        return view('admin.service_features.edit', compact('serviceFeature', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ServiceFeature $serviceFeature)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'title' => 'required',
            'description' => 'nullable',
            'sort_order' => 'nullable|integer',
        ]);

        $serviceFeature->update($validated);
        return redirect()->route('service-features.index')->with('success', 'Feature updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceFeature $serviceFeature)
    {
        $serviceFeature->delete();
        return redirect()->route('service-features.index')->with('success', 'Feature deleted!');
    }
}
