@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Why Choose Us Items</h2>
        <a href="{{ route('admin.values.create') }}" class="btn btn-primary">Add New</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body table-responsive p-3">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th style="width:5%">#</th>
                        <th style="width:15%">Icon</th>
                        <th style="width:25%">Title</th>
                        <th style="width:40%">Description</th>
                        <th style="width:15%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($values as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><i class="{{ $value->icon }}"></i> {{ $value->icon }}</td>
                            <td>{{ $value->title }}</td>
                            <td>{{ Str::limit($value->description, 80) }}</td>
                            <td>
                                <a href="{{ route('admin.values.edit', $value->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                <form action="{{ route('admin.values.destroy', $value->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this item?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Pagination --}}
            {{-- <div class="mt-3">
                {{ $values->links() }}
            </div> --}}
        </div>
    </div>
</div>
@endsection
