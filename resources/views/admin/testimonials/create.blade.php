@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid py-4">

        <h2 class="mb-4">Add Testimonial</h2>

        <div class="card shadow-sm">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.testimonials.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Testimony</label>
                        <textarea name="testimony" class="form-control" rows="4" required>{{ old('testimony') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status (optional)</label>
                        <input type="text" name="status" value="{{ old('status') }}" class="form-control"
                            placeholder="e.g. CEO, Manager">
                    </div>

                    {{-- <div class="mb-3">
                        <label class="form-label">Sort Order</label>
                        <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" class="form-control">
                    </div> --}}

                    <div class="mb-3">
                        <label class="form-label">Is Active?</label>
                        <select name="is_active" class="form-select">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <button class="btn btn-primary">Save</button>
                    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">Cancel</a>

                </form>

            </div>
        </div>

    </div>
@endsection