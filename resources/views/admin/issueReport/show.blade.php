@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h2>Issue Report Details</h2>
        <a href="{{ route('admin.issueReport.index') }}" class="btn btn-secondary mb-3">Back</a>

        <div class="card">
            <div class="card-body">
                <p><strong>Full Name:</strong> {{ $issue->full_name }}</p>
                <p><strong>Contact Number:</strong> {{ $issue->contact_number }}</p>
                <p><strong>Email:</strong> {{ $issue->email ?? '-' }}</p>
                <p><strong>Service ID:</strong> {{ $issue->service_id ?? '-' }}</p>
                <p><strong>Issue Type:</strong> {{ $issue->issue_type }}</p>
                <p><strong>Description:</strong> {{ $issue->issue_description }}</p>
                <p><strong>Resolved:</strong> {{ $issue->is_resolved ? 'Yes' : 'No' }}</p>
                <p><strong>Submitted At:</strong> {{ $issue->created_at->format('Y-m-d H:i') }}</p>

                <div class="mt-3">
                    @if(!$issue->is_resolved)
                        <form action="{{ route('admin.issueReport.resolve', $issue->id) }}" method="POST"
                            style="display:inline-block;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success"
                                onclick="return confirm('Mark this issue as resolved?')">Mark Resolved</button>
                        </form>
                    @else
                        <form action="{{ route('admin.issueReport.undo', $issue->id) }}" method="POST"
                            style="display:inline-block;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-warning" onclick="return confirm('Undo resolved status?')">Undo
                                Resolved</button>
                        </form>
                    @endif

                    {{-- Delete button --}}
                    <form action="{{ route('admin.issueReport.destroy', $issue->id) }}" method="POST"
                        style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Delete this issue?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection