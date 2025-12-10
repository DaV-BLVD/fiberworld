@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h2>Inquiry Details</h2>

        <a href="{{ route('admin.inquiries.index') }}" class="btn btn-secondary mb-3">Back</a>

        <div class="card mb-3">
            <div class="card-body">
                <p><strong>Full Name:</strong> {{ $inquiry->full_name }}</p>
                <p><strong>Email:</strong> {{ $inquiry->email ?? '-' }}</p>
                <p><strong>Phone:</strong> {{ $inquiry->phone_number ?? '-' }}</p>
                <p><strong>Service Type:</strong> {{ ucfirst($inquiry->service_type) }}</p>
                <p><strong>Message:</strong> {{ $inquiry->message }}</p>
                <p><strong>Status:</strong> <span class="badge 
                    @if($inquiry->status == 'pending') bg-warning
                    @elseif($inquiry->status == 'reviewed') bg-info
                    @else bg-success @endif">{{ ucfirst($inquiry->status) }}</span></p>

                {{-- Update Status --}}
                <form action="{{ route('admin.inquiries.updateStatus', $inquiry->id) }}" method="POST" class="mt-3">
                    @csrf
                    @method('PATCH')
                    <select name="status" class="form-select w-auto d-inline-block">
                        <option value="pending" {{ $inquiry->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="reviewed" {{ $inquiry->status == 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                        <option value="resolved" {{ $inquiry->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
                    </select>
                    <button class="btn btn-success btn-sm">Update Status</button>
                </form>
            </div>
        </div>
    </div>
@endsection