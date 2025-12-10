<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;

class InquiryController extends Controller
{
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email_address' => 'required|email|max:255',
            'phone_number' => 'nullable|string|max:50',
            'service_type' => 'required|in:home,business,leased_line,general',
            'message' => 'nullable|string',
        ]);

        // Save to DB
        Inquiry::create([
            'full_name' => $request->full_name,
            'email' => $request->email_address,
            'phone_number' => $request->phone_number,
            'service_type' => $request->service_type,
            'message' => $request->message,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Your inquiry has been submitted. We will contact you soon!');
    }
}
