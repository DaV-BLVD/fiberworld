<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactSubmission;

class AdminContactController extends Controller
{
    // List all contact submissions
    public function index()
    {
        $messages = ContactSubmission::orderBy('created_at', 'asc')->get();
        return view('admin.contacts.index', compact('messages'));
    }

    // Optionally, show a single message
    // public function show($id)
    // {
    //     $message = ContactSubmission::findOrFail($id);
    //     return view('admin.contacts.show', compact('message'));
    // }

    // Optionally, delete a message
    public function destroy($id)
    {
        $message = ContactSubmission::findOrFail($id);
        $message->delete();

        return redirect()->route('admin.contacts.index')
            ->with('success', 'Message deleted successfully.');
    }

    public function show($id)
    {
        $message = ContactSubmission::findOrFail($id);
        return view('admin.contacts.show', compact('message'));
    }
}
