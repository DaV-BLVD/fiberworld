<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FaqCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = FaqCategory::with('faqs')->get();
        return view('admin.faq_categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.faq_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:faq_categories,name',
            'faqs.*.question' => 'required|string|max:255',
            'faqs.*.answer' => 'required|string',
        ]);

        // Create category
        $category = FaqCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        // Create FAQs
        if ($request->has('faqs')) {
            foreach ($request->faqs as $faqData) {
                $category->faqs()->create([
                    'question' => $faqData['question'],
                    'answer' => $faqData['answer']
                ]);
            }
        }

        return redirect()->route('admin.faq-categories.index')->with('success', 'Category and FAQs added.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FaqCategory $faqCategory)
    {
        return view('admin.faq_categories.edit', compact('faqCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FaqCategory $faqCategory)
    {
        $request->validate([
            'name' => 'required|unique:faq_categories,name,' . $faqCategory->id,
        ]);

        $faqCategory->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()
            ->route('admin.faqs.index')
            ->with('success', 'Category updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FaqCategory $faqCategory)
    {
        $faqCategory->delete();

        return redirect()->route('admin.faq-categories.index')
            ->with('success', 'Category deleted.');
    }


    public function show($id)
    {
        $category = FaqCategory::with('faqs')->findOrFail($id);
        return view('admin.faqs.index', compact('category'));
    }
}
