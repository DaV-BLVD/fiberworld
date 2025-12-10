<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomPlanRequest;

class CustomPlanRequestController extends Controller
{
    /**
     * Display a listing of custom plan requests.
     */
    public function index()
    {
        $customPlans = CustomPlanRequest::orderBy('created_at', 'asc')->get();
        return view('admin.custom_plan_requests.index', compact('customPlans'));
    }

    /**
     * Remove the specified custom plan request from storage.
     */
    public function destroy($id)
    {
        $plan = CustomPlanRequest::findOrFail($id);
        $plan->delete();

        return redirect()->route('admin.custom_plans.index')->with('success', 'Custom plan request deleted successfully.');
    }

    public function show($id)
    {
        $customPlan = CustomPlanRequest::findOrFail($id);
        return view('admin.custom_plan_requests.show', compact('customPlan'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,provided',
        ]);

        $plan = CustomPlanRequest::findOrFail($id);
        $plan->status = $request->status;
        $plan->save();

        return redirect()->back()->with('success', 'Status updated successfully.');
    }

}
