@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4">Users</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">Add New Admin</a>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Admin</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>
                            {{ $user->name }}
                            @if($user->is_super_admin)
                                <span class="badge bg-danger ms-1" title="Super Admin">Super Admin</span>
                            @endif
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>
                            {{ $user->is_admin ? 'Yes' : 'No' }}
                            @if($user->is_super_admin)
                                <span class="text-danger ms-1">(Super Admin)</span>
                            @endif
                        </td>
                        <td>
                            {{-- Edit Button --}}
                            @if(!$user->is_super_admin && (!$user->is_admin || auth()->user()->is_super_admin))
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            @endif

                            {{-- Delete Button --}}
                            @if(!$user->is_super_admin && (!$user->is_admin || auth()->user()->is_super_admin))
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                    style="display:inline-block;"
                                    onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        Delete
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection