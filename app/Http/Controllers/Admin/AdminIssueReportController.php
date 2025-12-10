<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IssueReport;

class AdminIssueReportController extends Controller
{
    public function index()
    {
        $issues = IssueReport::orderBy('created_at', 'asc')->get();
        return view('admin.issueReport.index', compact('issues'));
    }

    // public function show($id)
    // {
    //     $issue = IssueReport::findOrFail($id);
    //     return view('admin.issueReport.show', compact('issue'));
    // }

    public function destroy($id)
    {
        $issue = IssueReport::findOrFail($id);
        $issue->delete();

        return redirect()->route('admin.issueReport.index')
            ->with('success', 'Issue report deleted successfully.');
    }

    public function markResolved($id)
    {
        $issue = IssueReport::findOrFail($id);
        $issue->is_resolved = true;
        $issue->save();

        return redirect()->back()->with('success', 'Issue marked as resolved.');
    }

    public function undoResolve($id)
    {
        $issue = IssueReport::findOrFail($id);
        $issue->is_resolved = false;
        $issue->save();

        return redirect()->back()->with('success', 'Issue resolution undone.');
    }

    public function show($id)
    {
        $issue = IssueReport::findOrFail($id);
        return view('admin.issueReport.show', compact('issue'));
    }
}
