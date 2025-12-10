@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Contact Form Submissions</h2>
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
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Submitted At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($messages as $msg)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $msg->full_name }}</td>
                            <td>{{ $msg->email }}</td>
                            <td>{{ $msg->phone ?? '-' }}</td>
                            <td>{{ $msg->subject }}</td>
                            <td>{{ Str::limit($msg->message, 50) }}</td>
                            <td>{{ $msg->created_at->format('Y-m-d H:i') }}</td>
                            <td class="d-flex gap-1 flex-wrap">
                                {{-- View Button --}}
                                <a href="{{ route('admin.contacts.show', $msg->id) }}" class="btn btn-sm btn-primary">View</a>

                                {{-- Delete Button --}}
                                <form action="{{ route('admin.contacts.destroy', $msg->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this message?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Pagination --}}
            {{-- <div class="mt-3">
                {{ $messages->links() }}
            </div> --}}
        </div>
    </div>
</div>
@endsection
