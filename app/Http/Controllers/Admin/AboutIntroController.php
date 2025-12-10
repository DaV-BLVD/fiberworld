<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutIntro;
use App\Models\AboutIntroParagraph;
use Illuminate\Http\Request;

class AboutIntroController extends Controller
{
    public function index()
    {
        $intro = AboutIntro::with('paragraphs')->first();
        return view('admin.about_intro.index', compact('intro'));
    }

    public function create()
    {
        return view('admin.about_intro.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'paragraphs.*' => 'nullable|string',
        ]);

        $intro = AboutIntro::create([
            'title' => $request->title,
        ]);

        if ($request->paragraphs) {
            foreach ($request->paragraphs as $index => $para) {
                if ($para) {
                    AboutIntroParagraph::create([
                        'about_intro_id' => $intro->id,
                        'paragraph' => $para,
                        'order_no' => $index + 1
                    ]);
                }
            }
        }

        return redirect()->route('admin.about_intro.index')->with('success', 'Intro created successfully.');
    }

    public function edit(AboutIntro $about_intro)
    {
        return view('admin.about_intro.edit', compact('about_intro'));
    }

    public function update(Request $request, AboutIntro $about_intro)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'paragraphs.*' => 'nullable|string',
        ]);

        $about_intro->update(['title' => $request->title]);

        // Delete old paragraphs
        AboutIntroParagraph::where('about_intro_id', $about_intro->id)->delete();

        // Insert new paragraphs
        if ($request->paragraphs) {
            foreach ($request->paragraphs as $index => $para) {
                if ($para) {
                    AboutIntroParagraph::create([
                        'about_intro_id' => $about_intro->id,
                        'paragraph' => $para,
                        'order_no' => $index + 1
                    ]);
                }
            }
        }

        return redirect()->route('admin.about_intro.index')->with('success', 'Intro updated successfully.');
    }
}
