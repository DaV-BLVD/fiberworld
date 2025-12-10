@extends('admin.layouts.app')

@section('content')
    <div class="ml-4">
        <h3>Add District</h3>

        <form action="{{ route('admin.coverage.districts.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>District Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <button class="btn btn-primary">Save</button>
            <a href="{{ route('admin.coverage.districts.index') }}" class="btn btn-secondary">← Back</a>

        </form>
    </div>
@endsection