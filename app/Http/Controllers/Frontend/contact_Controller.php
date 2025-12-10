<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class contact_Controller extends Controller
{
    public function index()
    {
        return view('frontend.contact');
    }
}
