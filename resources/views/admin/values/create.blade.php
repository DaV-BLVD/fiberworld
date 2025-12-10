@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h2>Add New Value</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.values.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Icon (Bootstrap Icon class)</label>
                <input type="text" name="icon" class="form-control" placeholder="e.g. bi bi-speedometer2"
                    value="{{ old('icon') }}">
            </div>
            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
            </div>
            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('admin.values.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection