@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Value</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.values.update', $value->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Icon (Bootstrap Icon class)</label>
                <input type="text" name="icon" class="form-control" value="{{ old('icon', $value->icon) }}">
            </div>
            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $value->title) }}">
            </div>
            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control"
                    rows="4">{{ old('description', $value->description) }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('admin.values.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection