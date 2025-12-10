@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Inquiries</h2>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body table-responsive p-3">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Service Type</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inquiries as $inquiry)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $inquiry->full_name }}</td>
                                <td>{{ $inquiry->email ?? '-' }}</td>
                                <td>{{ $inquiry->phone_number ?? '-' }}</td>
                                <td>{{ ucfirst($inquiry->service_type) }}</td>
                                <td>{{ Str::limit($inquiry->message, 50) }}</td>
                                <td>
                                    <span class="badge 
                                            @if($inquiry->status == 'pending') bg-warning
                                            @elseif($inquiry->status == 'reviewed') bg-info
                                            @else bg-success @endif">
                                        {{ ucfirst($inquiry->status) }}
                                    </span>
                                </td>
                                <td class="d-flex gap-1 flex-wrap">
                                    <a href="{{ route('admin.inquiries.show', $inquiry->id) }}"
                                        class="btn btn-primary btn-sm">View</a>

                                    <form action="{{ route('admin.inquiries.destroy', $inquiry->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Delete this inquiry?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Pagination --}}
                {{-- <div class="mt-3">
                    {{ $inquiries->links() }}
                </div> --}}
            </div>
        </div>
    </div>
@endsection