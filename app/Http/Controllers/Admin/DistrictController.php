<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;
use Illuminate\Support\Str;

class DistrictController extends Controller
{
    public function index()
    {
        $districts = District::latest()->get();
        return view('admin.coverage.districts.index', compact('districts'));
    }

    public function create()
    {
        return view('admin.coverage.districts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:districts,name'
        ]);

        District::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->route('admin.coverage.districts.index')->with('success', 'District added successfully');
    }

    public function edit(District $district)
    {
        return view('admin.coverage.districts.edit', compact('district'));
    }

    public function update(Request $request, District $district)
    {
        $request->validate([
            'name' => 'required|unique:districts,name,' . $district->id
        ]);

        $district->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->route('admin.coverage.districts.index')->with('success', 'District updated successfully');
    }

    public function destroy(District $district)
    {
        $district->delete();
        return back()->with('success', 'District deleted');
    }
}
