@extends('admin.layouts.app')

@section('content')
    <h3>Edit District</h3>

    <form action="{{ route('admin.coverage.districts.update', $district->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>District Name</label>
            <input type="text" name="name" class="form-control" value="{{ $district->name }}" required>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('admin.coverage.districts.index') }}" class="btn btn-secondary">← Back</a>

    </form>
@endsection