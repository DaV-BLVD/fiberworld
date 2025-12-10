@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3>Hero Sliders</h3>
            <a href="{{ route('admin.hero_sliders.create') }}" class="btn btn-primary">Add New Slider</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body table-responsive p-3"> {{-- Add padding --}}
                <table class="table table-bordered"> {{-- Optional: bordered to fill space --}}
                    <thead>
                        <tr>
                            <th style="width:5%">SN</th>
                            <th style="width:25%">Title</th>
                            <th style="width:40%">Description</th>
                            <th style="width:20%">Image</th>
                            <th style="width:10%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sliders as $index => $slider)
                            <tr>
                                {{-- Serial number (SN) --}}
                                <td>{{ $sliders->firstItem() + $index }}</td>
                                <td>{{ $slider->title }}</td>
                                <td>{{ Str::limit($slider->description, 50) }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $slider->image) }}" alt="Slider Image"
                                        style="height: 50px;">
                                </td>
                                <td>
                                    <a href="{{ route('admin.hero_sliders.edit', $slider->id) }}"
                                        class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('admin.hero_sliders.destroy', $slider->id) }}" method="POST"
                                        style="display:inline-block;"
                                        onsubmit="return confirm('⚠️ Are you sure you want to delete this slider? This action cannot be undone.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Pagination --}}
                <div class="mt-3">
                    {{ $sliders->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection