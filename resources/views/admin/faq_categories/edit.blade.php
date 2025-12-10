@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h2>Edit FAQ Category</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.faq-categories.update', $faqCategory->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $faqCategory->name) }}" required>
            </div>

            <button type="submit" class="btn btn-primary mt-2">Update Category</button>
            <a href="{{ url('admin.faq-categories.show') }}" class="btn btn-secondary mt-2">Cancel</a>
        </form>
    </div>
@endsection