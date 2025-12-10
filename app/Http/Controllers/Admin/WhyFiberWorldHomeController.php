<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WhyFiberWorldHome;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class WhyFiberWorldHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        // Retrieve only active items, ordered
        $items = WhyFiberWorldHome::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('admin.whyfiberworld.home.index', compact('items'));

    }

    // public function showHomeItems()
    // {
    //     $items = WhyFiberWorldHome::where('is_active', true)
    //         ->orderBy('sort_order', 'asc')
    //         ->get();

    //     return view('frontend.whyfiberworld.home', compact('items'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.whyfiberworld.home.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon_image' => 'nullable|file|mimes:jpg,jpeg,png,svg,webp|max:2048',
            'icon_class' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'is_active' => 'required|boolean',
            'sort_order' => 'nullable|integer'
        ]);

        $data = $request->only(['title', 'description', 'is_active', 'sort_order']);

        // Handle icon: image OR class
        if ($request->hasFile('icon_image')) {
            $data['icon'] = $request->file('icon_image')->store('why_fiber_world', 'public');
        } elseif ($request->icon_class) {
            $data['icon'] = $request->icon_class;
        }

        WhyFiberWorldHome::create($data);

        return redirect()->route('admin.whyfiberworld.home.index')
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
        $item = WhyFiberWorldHome::findOrFail($id);
        return view('admin.whyfiberworld.home.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = WhyFiberWorldHome::findOrFail($id);

        $request->validate([
            'icon_image' => 'nullable|file|mimes:jpg,jpeg,png,svg,webp|max:2048',
            'icon_class' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'is_active' => 'required|boolean',
            'sort_order' => 'nullable|integer'
        ]);

        $data = $request->only(['title', 'description', 'is_active', 'sort_order']);

        // Handle icon: image OR class
        if ($request->hasFile('icon_image')) {
            // Delete old image if it exists and is a file
            if ($item->icon && !Str::startsWith($item->icon, 'bi ') && Storage::disk('public')->exists($item->icon)) {
                Storage::disk('public')->delete($item->icon);
            }

            $data['icon'] = $request->file('icon_image')->store('whyfiberworld', 'public');
        } elseif ($request->icon_class) {
            $data['icon'] = $request->icon_class;
        }

        $item->update($data);

        return redirect()->route('admin.whyfiberworld.home.index')
            ->with('success', 'Item updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = WhyFiberWorldHome::findOrFail($id);

        if ($item->icon && Storage::disk('public')->exists($item->icon)) {
            Storage::disk('public')->delete($item->icon);
        }

        $item->delete();

        return redirect()->route('admin.whyfiberworld.home.index')
            ->with('success', 'Item deleted successfully!');
    }
}
