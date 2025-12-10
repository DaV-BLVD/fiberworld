<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HeroSlider;
use Illuminate\Support\Facades\Storage;

class HeroSliderController extends Controller
{
    /**
     * Display a listing of the sliders.
     */
    public function index()
    {
        $sliders = HeroSlider::orderBy('id', 'asc')->paginate(10);
        return view('admin.header_slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new slider.
     */
    public function create()
    {
        return view('admin.header_slider.create');
    }

    /**
     * Store a newly created slider in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'button_text' => 'nullable|string|max:50',
            'button_link' => 'nullable|string|max:255',
            'button_type' => 'nullable|string|max:20',
            'button_text2' => 'nullable|string|max:50',
            'button_link2' => 'nullable|string|max:255',
            'button_type2' => 'nullable|string|max:20',
        ]);

        // Apply default values AFTER validation
        $request->merge([
            'button_text' => $request->button_text ?: 'View Plans',
            'button_link' => $request->button_link ?: '/plans',
            'button_text2' => $request->button_text2 ?: 'Check Coverage',
            'button_link2' => $request->button_link2 ?: '/coverage',
            'button_type' => $request->button_link2 ?: 'primary',
            'button_type2' => $request->button_link2 ?: 'outline-light',
        ]);

        // Store image
        $path = $request->file('image')->store('hero_sliders', 'public');

        // Create slider
        HeroSlider::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path,
            'button_text' => $request->button_text,
            'button_link' => $request->button_link,
            'button_type' => $request->button_type,
            'button_text2' => $request->button_text2,
            'button_link2' => $request->button_link2,
            'button_type2' => $request->button_type2,
        ]);

        return redirect()->route('admin.hero_sliders.index')
            ->with('success', 'Slider added successfully.');
    }


    /**
     * Show the form for editing the specified slider.
     */
    public function edit(HeroSlider $hero_slider)
    {
        return view('admin.header_slider.edit', compact('hero_slider'));
    }

    /**
     * Update the specified slider in storage.
     */
    public function update(Request $request, HeroSlider $hero_slider)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'button_text' => 'nullable|string|max:50',
            'button_link' => 'nullable|string|max:255',
            'button_type' => 'nullable|string|max:20',
            'button_text2' => 'nullable|string|max:50',
            'button_link2' => 'nullable|string|max:255',
            'button_type2' => 'nullable|string|max:20',
        ]);

        // Apply default values for empty fields
        $button_text = $request->button_text ?: 'View Plans';
        $button_link = $request->button_link ?: '/plans';
        $button_type = $request->button_type ?: 'primary';

        $button_text2 = $request->button_text2 ?: 'Check Coverage';
        $button_link2 = $request->button_link2 ?: '/coverage';
        $button_type2 = $request->button_type2 ?: 'outline-light';

        // Update image if a new one is uploaded
        if ($request->hasFile('image')) {
            if ($hero_slider->image && Storage::disk('public')->exists($hero_slider->image)) {
                Storage::disk('public')->delete($hero_slider->image);
            }
            $hero_slider->image = $request->file('image')->store('hero_sliders', 'public');
        }

        // Update all fields
        $hero_slider->update([
            'title' => $request->title,
            'description' => $request->description,
            'button_text' => $button_text,
            'button_link' => $button_link,
            'button_type' => $button_type,
            'button_text2' => $button_text2,
            'button_link2' => $button_link2,
            'button_type2' => $button_type2,
        ]);

        return redirect()->route('admin.hero_sliders.index')
            ->with('success', 'Slider updated successfully.');
    }


    /**
     * Remove the specified slider from storage.
     */
    public function destroy(HeroSlider $hero_slider)
    {
        if ($hero_slider->image && Storage::disk('public')->exists($hero_slider->image)) {
            Storage::disk('public')->delete($hero_slider->image);
        }

        $hero_slider->delete();

        return redirect()->route('admin.hero_sliders.index')->with('success', 'Slider deleted successfully.');
    }

    /**
     * Copy the specified slider.
     */
    public function copy(HeroSlider $hero_slider)
    {
        $newSlider = $hero_slider->replicate(); // Copy all fields except id
        $newSlider->created_at = now();
        $newSlider->updated_at = now();
        $newSlider->save();

        return redirect()->route('admin.hero_sliders.index')->with('success', 'Slider copied successfully.');
    }
}
