@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Testimonials</h2>
            <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">Add Testimonial</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Testimony</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Active</th>
                            {{-- <th>Sort Order</th> --}}
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($testimonials as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ Str::limit($item->testimony, 50) }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->status ?? '—' }}</td>
                                <td>
                                    @if($item->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                {{-- <td>{{ $item->sort_order }}</td> --}}
                                <td>
                                    <a href="{{ route('admin.testimonials.edit', $item->id) }}"
                                        class="btn btn-sm btn-warning">Edit</a>

                                    <form action="{{ route('admin.testimonials.destroy', $item->id) }}" method="POST"
                                        style="display:inline-block;" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No testimonials found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection