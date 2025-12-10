<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeFaq;


class HomeFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = HomeFaq::orderBy('sort_order', 'asc')->get();

        return view('admin.homefaq.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.homefaq.create');
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

        HomeFaq::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'is_active' => $request->is_active,
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect()->route('admin.faqs.home.index')
            ->with('success', 'FAQ created successfully!');
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
        $item = HomeFaq::findOrFail($id);

        return view('admin.homefaq.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = HomeFaq::findOrFail($id);

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

        return redirect()->route('admin.faqs.home.index')
            ->with('success', 'FAQ updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = HomeFaq::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.faqs.home.index')
            ->with('success', 'FAQ deleted successfully!');
    }
}
