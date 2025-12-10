<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Area;


class AreaController extends Controller
{
    public function index(Request $request)
    {
        // $areas = Area::with('district')->latest()->get();
        // return view('admin.coverage.areas.index', compact('areas'));

        $districtId = $request->district_id;

        $areas = Area::when($districtId, function ($query) use ($districtId) {
            $query->where('district_id', $districtId);
        })->get();

        $district = District::find($districtId);

        return view('admin.coverage.areas.index', compact('areas', 'district'));
    }

    public function create(Request $request)
    {
        // $districts = District::all();

        // // Get district_id from query string, if passed
        // $selectedDistrict = $request->query('district_id');

        // return view('admin.coverage.areas.create', compact('districts', 'selectedDistrict'));

        $districts = District::all();
        $selectedDistrict = $request->district_id; // auto-select

        return view('admin.coverage.areas.create', compact('districts', 'selectedDistrict'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'district_id' => 'required',
            'area_name' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric'
        ]);

        Area::create($request->all());

        return redirect()->route('admin.coverage.areas.index')->with('success', 'Area added successfully');
    }

    public function edit(Area $area)
    {
        $districts = District::all();
        return view('admin.coverage.areas.edit', compact('area', 'districts'));
    }

    public function update(Request $request, Area $area)
    {
        $request->validate([
            'district_id' => 'required',
            'area_name' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric'
        ]);

        $area->update($request->all());

        return redirect()->route('admin.coverage.areas.index')->with('success', 'Area updated successfully');
    }

    public function destroy(Area $area)
    {
        $area->delete();
        return back()->with('success', 'Area deleted');
    }
}


