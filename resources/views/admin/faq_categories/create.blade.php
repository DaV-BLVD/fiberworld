@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 px-4">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add FAQ Category</h3>
                </div>

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.faq-categories.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                placeholder="Enter category name" required>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Add Category</button>
                        <a href="{{ route('admin.faq-categories.index') }}" class="btn btn-secondary mt-3">Cancel</a>

                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection