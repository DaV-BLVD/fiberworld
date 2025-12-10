<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class business_internetController extends Controller
{
    public function index() {
        return view('frontend.business_internet');
    }
}
