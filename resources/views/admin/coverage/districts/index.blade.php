@extends('admin.layouts.app')

@section('content')
    <div class="ml-4">
        <h3>Districts</h3>

        <a href="{{ route('admin.coverage.districts.create') }}" class="btn btn-primary mb-3">Add District</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($districts as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->name }}</td>
                        <td>
                            <a href="{{ route('admin.coverage.districts.edit', $d->id) }}"
                                class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('admin.coverage.districts.destroy', $d->id) }}" method="POST"
                                class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>

                            <!-- Add Area Button -->
                            <a href="{{ route('admin.coverage.areas.index') }}?district_id={{ $d->id }}"
                                class="btn btn-success btn-sm">
                                View Areas
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection