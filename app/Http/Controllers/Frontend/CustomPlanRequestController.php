<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomPlanRequest;

class CustomPlanRequestController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'speed' => 'required|integer|min:0',
            'data_limit' => 'nullable|integer|min:0',
            'unlimited_data' => 'required|boolean',
            'calculated_price' => 'required|numeric|min:0',
            'email' => 'nullable|email',
            'phone' => 'required|string|max:20',
        ]);

        CustomPlanRequest::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Your custom plan request has been submitted. Our team will contact you soon!'
        ]);
    }

}