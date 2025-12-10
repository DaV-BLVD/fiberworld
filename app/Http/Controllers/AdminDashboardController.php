<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $inquiries = Inquiry::latest()->take(10)->get();

        return view('admin.dashboard', compact('inquiries'));
    }
}
