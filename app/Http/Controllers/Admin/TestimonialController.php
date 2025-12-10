<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display all testimonials.
     */
    public function index()
    {
        $testimonials = Testimonial::orderBy('id', 'asc')->get();

        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show form to create a testimonial.
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a new testimonial.
     */
    public function store(Request $request)
    {
        $request->validate([
            'testimony' => 'required|string',
            'name' => 'required|string|max:255',
            'status' => 'nullable|string|max:255',
            'is_active' => 'required|boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        // Auto-generate next sort_order if empty
        $sortOrder = $request->sort_order;
        if ($sortOrder === null || $sortOrder === '') {
            $sortOrder = Testimonial::max('sort_order') + 1;
        }

        Testimonial::create([
            'testimony' => $request->testimony,
            'name' => $request->name,
            'status' => $request->status,
            'is_active' => $request->is_active,
            'sort_order' => $sortOrder,
        ]);

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial created successfully.');
    }

    /**
     * Show edit form.
     */
    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update testimonial.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'testimony' => 'required|string',
            'name' => 'required|string|max:255',
            'status' => 'nullable|string|max:255',
            'is_active' => 'required|boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $testimonial = Testimonial::findOrFail($id);

        // Auto-generate next sort_order if empty
        $sortOrder = $request->sort_order;
        if ($sortOrder === null || $sortOrder === '') {
            $sortOrder = Testimonial::max('sort_order') + 1;
        }

        $testimonial->update([
            'testimony' => $request->testimony,
            'name' => $request->name,
            'status' => $request->status,
            'is_active' => $request->is_active,
            'sort_order' => $sortOrder,
        ]);

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    /**
     * Delete testimonial.
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial deleted successfully.');
    }
}
