@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h2>Contact Message Details</h2>

        <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary mb-3">Back</a>

        <div class="card">
            <div class="card-body">
                <p><strong>Full Name:</strong> {{ $message->full_name }}</p>
                <p><strong>Email:</strong> {{ $message->email }}</p>
                <p><strong>Phone:</strong> {{ $message->phone ?? '-' }}</p>
                <p><strong>Subject:</strong> {{ $message->subject }}</p>
                <p><strong>Message:</strong></p>
                <p>{{ $message->message }}</p>
                <p><strong>Submitted At:</strong> {{ $message->created_at->format('Y-m-d H:i') }}</p>

                {{-- Delete Button --}}
                <form action="{{ route('admin.contacts.destroy', $message->id) }}" method="POST" class="mt-3">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to delete this message?')">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection