@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <h2>My Profile</h2>
        <div class="card">
            <div class="card-body">
                <p><strong>Name:</strong> {{ $admin->name }}</p>
                <p><strong>Email:</strong> {{ $admin->email }}</p>
                <p><strong>Role:</strong> {{ $admin->is_admin ? 'Admin' : 'User' }}</p>

                <a href="{{ route('admin.profile.edit') }}" class="btn btn-primary">Edit Profile</a>
            </div>
        </div>
    </div>
@endsection