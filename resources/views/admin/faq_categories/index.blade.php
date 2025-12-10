@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 px-4">

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">FAQ Categories</h3>
                    <a href="{{ route('admin.faq-categories.create') }}" class="btn btn-success">Add New Category</a>
                </div>

                <div class="card-body">

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($categories->count() > 0)
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Category Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <a href="{{ route('admin.faq-categories.edit', $category->id) }}"
                                                class="btn btn-primary btn-sm">Edit</a>

                                            <a href="{{ route('admin.faq-categories.show', $category->id) }}"
                                                class="btn btn-info btn-sm">View</a>

                                            <form action="{{ route('admin.faq-categories.destroy', $category->id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this category?');">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-center">No FAQ categories found.</p>
                    @endif

                </div>
            </div>

        </div>
    </div>
@endsection