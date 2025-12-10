<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PlansandPricingWhyFiberWorld;
use Illuminate\Support\Facades\Storage;

class PlansandPricingWhyFiberWorldController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = PlansandPricingWhyFiberWorld::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('admin.plansandpricing.whyfiberworld.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.plansandpricing.whyfiberworld.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon_image' => 'nullable|file|mimes:jpg,jpeg,png,svg,webp|max:2048',
            'icon_class' => 'nullable|string|max:100', // for bi icons
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'is_active' => 'required|boolean',
            'sort_order' => 'nullable|integer'
        ]);

        $data = $request->all();

        if ($request->hasFile('icon_image')) {
            $data['icon'] = $request->file('icon_image')->store('why_fiber_world', 'public');
        } elseif ($request->icon_class) {
            $data['icon'] = $request->icon_class;
        } else {
            $data['icon'] = null;
        }

        PlansandPricingWhyFiberWorld::create($data);

        return redirect()->route('admin.plansandpricing.whyfiberworld.index')
            ->with('success', 'Item created successfully!');
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
    public function edit(string $id)
    {
        $item = PlansandPricingWhyFiberWorld::findOrFail($id);
        return view('admin.plansandpricing.whyfiberworld.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $item = PlansandPricingWhyFiberWorld::findOrFail($id);

    $request->validate([
        'icon_image' => 'nullable|file|mimes:jpg,jpeg,png,svg,webp|max:2048',
        'icon_class' => 'nullable|string|max:100',
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'is_active' => 'required|boolean',
        'sort_order' => 'nullable|integer'
    ]);

    $data = $request->all();

    if ($request->hasFile('icon_image')) {
        // Delete old icon if it was an image
        if ($item->icon && Storage::disk('public')->exists($item->icon)) {
            Storage::disk('public')->delete($item->icon);
        }
        $data['icon'] = $request->file('icon_image')->store('why_fiber_world', 'public');
    } elseif ($request->icon_class) {
        $data['icon'] = $request->icon_class;
    }

    $item->update($data);

    return redirect()->route('admin.plansandpricing.whyfiberworld.index')
        ->with('success', 'Item updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = PlansandPricingWhyFiberWorld::findOrFail($id);

        if ($item->icon && Storage::disk('public')->exists($item->icon)) {
            Storage::disk('public')->delete($item->icon);
        }

        $item->delete();

        return redirect()->route('admin.plansandpricing.whyfiberworld.index')
            ->with('success', 'Item deleted successfully!');
    }
}
