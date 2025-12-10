@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <h2>Edit Profile</h2>

        {{-- Flash message for success --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.profile.update') }}" method="POST">
            @csrf
            @method('PUT') {{-- If your route uses PUT, otherwise remove this line --}}

            <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ old('name', $admin->name) }}" class="form-control">
                @error('name')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{ old('email', $admin->email) }}" class="form-control">
                @error('email')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="password">Password</label>
                <div class="input-group">
                    <input type="password" id="password" name="password" class="form-control"
                        placeholder="Enter new password if changing">
                    <span class="input-group-text" id="showPasswordBtn" style="cursor:pointer;">Show</span>
                </div>
                <small class="text-muted">Leave blank if you don't want to change password</small>
                @error('password')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        const passwordInput = document.getElementById('password');
        const showBtn = document.getElementById('showPasswordBtn');

        showBtn.addEventListener('click', function () {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                showBtn.textContent = 'Hide';
            } else {
                passwordInput.type = 'password';
                showBtn.textContent = 'Show';
            }
        });
    </script>
@endsection