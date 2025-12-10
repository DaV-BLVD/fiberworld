<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomPlanSetting;

class CustomPlanSettingController extends Controller
{
    public function index()
    {
        $settings = CustomPlanSetting::all();
        return view('admin.custom_plan_settings.index', compact('settings'));
    }

    public function create()
    {
        return view('admin.custom_plan_settings.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'speed_min' => 'required|numeric',
            'speed_max' => 'required|numeric',
            'speed_step' => 'required|numeric',
            'data_min' => 'required|numeric',
            'data_max' => 'required|numeric',
            'data_step' => 'required|numeric',
            'price_per_mbps' => 'required|numeric',
            'price_per_gb' => 'required|numeric',
            'unlimited_data_price' => 'required|numeric',
            // Remove 'required' here because unchecked checkbox is null
            'is_active' => 'nullable|boolean',
        ]);

        // If checkbox is not checked, default to 0
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        // If this plan is active, deactivate all others
        if ($data['is_active']) {
            CustomPlanSetting::query()->update(['is_active' => false]);
        }

        CustomPlanSetting::create($data);

        return redirect()->route('admin.custom_plan_settings.index')
            ->with('success', 'Custom Plan Setting created.');
    }


    public function edit(CustomPlanSetting $customPlanSetting)
    {
        return view('admin.custom_plan_settings.edit', compact('customPlanSetting'));
    }

    public function update(Request $request, CustomPlanSetting $customPlanSetting)
    {
        $data = $request->validate([
            'speed_min' => 'required|numeric',
            'speed_max' => 'required|numeric',
            'speed_step' => 'required|numeric',
            'data_min' => 'required|numeric',
            'data_max' => 'required|numeric',
            'data_step' => 'required|numeric',
            'price_per_mbps' => 'required|numeric',
            'price_per_gb' => 'required|numeric',
            'unlimited_data_price' => 'required|numeric',
            'is_active' => 'nullable|boolean',
        ]);

        // If this plan is set to active, deactivate all other plans
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        $customPlanSetting->update($data);

        return redirect()->route('admin.custom_plan_settings.index')
            ->with('success', 'Custom Plan Setting updated.');
    }


    public function destroy(CustomPlanSetting $customPlanSetting)
    {
        $customPlanSetting->delete();
        return redirect()->route('admin.custom_plan_settings.index')->with('success', 'Custom Plan Setting deleted.');
    }

    public function activate($id)
    {
        // Deactivate all settings first
        CustomPlanSetting::query()->update(['is_active' => false]);

        // Activate selected setting
        $setting = CustomPlanSetting::findOrFail($id);
        $setting->update(['is_active' => true]);

        return redirect()->back()->with('success', 'Custom plan setting activated.');
    }
}
