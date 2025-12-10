<?php

namespace App\Http\Controllers;

use App\Models\IssueReport;
use Illuminate\Http\Request;

class IssueReportController extends Controller
{
    // Admin: Show all reports
    // public function index()
    // {
    //     $reports = IssueReport::orderBy('created_at', 'desc')->get();
    //     return view('admin.issue_reports.index', compact('reports'));
    // }

    // Admin: Show form to create (optional, normally user submits frontend form)
    // public function create()
    // {
    //     return view('frontend.issue_reports.create');
    // }

    // Store report from frontend form
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:50',
            'email' => 'nullable|email|max:255',
            'service_id' => 'nullable|string|max:50',
            'issue_type' => 'required|in:no-internet,slow-speed,intermittent-connection,wifi-problem,billing-issue,other',
            'issue_description' => 'required|string',
        ]);

        IssueReport::create($validated);

        return redirect()->back()->with('success', 'Your issue has been submitted successfully.');
    }

    // Show single report
    // public function show(IssueReport $issueReport)
    // {
    //     return view('admin.issue_reports.show', compact('issueReport'));
    // }

    // // Admin: mark as resolved form
    // public function edit(IssueReport $issueReport)
    // {
    //     return view('admin.issue_reports.edit', compact('issueReport'));
    // }

    // Admin: update resolved status
    // public function update(Request $request, IssueReport $issueReport)
    // {
    //     $validated = $request->validate([
    //         'is_resolved' => 'required|boolean',
    //     ]);

    //     $issueReport->update($validated);

    //     return redirect()->route('issue-reports.index')->with('success', 'Report updated successfully.');
    // }

    // // Admin: delete report
    // public function destroy(IssueReport $issueReport)
    // {
    //     $issueReport->delete();
    //     return redirect()->route('issue-reports.index')->with('success', 'Report deleted successfully.');
    // }


}
