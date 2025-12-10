<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class report_issueController extends Controller
{
    public function index() {
        return view('frontend.report_issue');
    }
}
