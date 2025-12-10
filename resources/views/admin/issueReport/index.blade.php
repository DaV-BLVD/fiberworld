@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Issue Reports</h2>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body table-responsive p-3">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>SN</th>
                            <th>Full Name</th>
                            <th>Contact Number</th>
                            <th>Email</th>
                            <th>Service ID</th>
                            <th>Issue Type</th>
                            <th>Description</th>
                            <th>Resolved</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($issues as $issue)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $issue->full_name }}</td>
                                <td>{{ $issue->contact_number }}</td>
                                <td>{{ $issue->email ?? '-' }}</td>
                                <td>{{ $issue->service_id ?? '-' }}</td>
                                <td>{{ $issue->issue_type }}</td>
                                <td>{{ Str::limit($issue->issue_description, 50) }}</td>
                                <td>{{ $issue->is_resolved ? 'Yes' : 'No' }}</td>
                                <td class="d-flex gap-1 flex-wrap">
                                    {{-- View Button --}}
                                    <a href="{{ route('admin.issueReport.show', $issue->id) }}"
                                        class="btn btn-primary btn-sm">View</a>

                                    {{-- Resolve / Undo --}}
                                    @if(!$issue->is_resolved)
                                        <form action="{{ route('admin.issueReport.resolve', $issue->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-success btn-sm"
                                                onclick="return confirm('Mark this issue as resolved?')">Mark Resolved</button>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.issueReport.undo', $issue->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-warning btn-sm"
                                                onclick="return confirm('Undo resolved status?')">Undo</button>
                                        </form>
                                    @endif

                                    {{-- Delete Button --}}
                                    <form action="{{ route('admin.issueReport.destroy', $issue->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Delete this issue?')">Delete</button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Pagination --}}
                {{-- <div class="mt-3">
                    {{ $issues->links() }}
                </div> --}}
            </div>
        </div>
    </div>
@endsection