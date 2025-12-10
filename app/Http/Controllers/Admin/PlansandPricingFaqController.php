<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PlansandPricingFaq;

class PlansandPricingFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = PlansandPricingFaq::orderBy('sort_order', 'asc')->get();

        return view('admin.plansandpricing.faq.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.plansandpricing.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'is_active' => 'required|boolean',
            'sort_order' => 'nullable|integer'
        ]);

        PlansandPricingFaq::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'is_active' => $request->is_active,
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect()->route('admin.plansandpricing.faq.index')
            ->with('success', 'FAQ created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = PlansandPricingFaq::findOrFail($id);

        return view('admin.plansandpricing.faq.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = PlansandPricingFaq::findOrFail($id);

        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'is_active' => 'required|boolean',
            'sort_order' => 'nullable|integer'
        ]);

        $item->update([
            'question' => $request->question,
            'answer' => $request->answer,
            'is_active' => $request->is_active,
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect()->route('admin.plansandpricing.faq.index')
            ->with('success', 'FAQ updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = PlansandPricingFaq::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.plansandpricing.faq.index')
            ->with('success', 'FAQ deleted successfully!');
    }
}
