<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class AdminInquiryController extends Controller
{
    // List all inquiries
    public function index()
    {
        $inquiries = Inquiry::orderBy('created_at', 'asc')->get();
        return view('admin.inquiries.index', compact('inquiries'));
    }

    // Show a single inquiry
    public function show($id)
    {
        $inquiry = Inquiry::findOrFail($id);
        return view('admin.inquiries.show', compact('inquiry'));
    }

    // Update status (reviewed/resolved)
    public function updateStatus(Request $request, $id)
    {
        $inquiry = Inquiry::findOrFail($id);

        $request->validate([
            'status' => 'required|in:pending,reviewed,resolved',
        ]);

        $inquiry->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Inquiry status updated.');
    }

    // Delete an inquiry
    public function destroy($id)
    {
        $inquiry = Inquiry::findOrFail($id);
        $inquiry->delete();

        return redirect()->back()->with('success', 'Inquiry deleted.');
    }
}
