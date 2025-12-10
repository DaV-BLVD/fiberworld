@extends('admin.layouts.app')

@section('content')
    <div class="ml-4">
        <h3>Areas @if($district) ({{ $district->name }}) @endif</h3>

        <a href="{{ route('admin.coverage.areas.create', ['district_id' => $district?->id]) }}"
            class="btn btn-primary mb-3">
            Add Area
        </a>
        <a href="{{ route('admin.coverage.districts.index') }}" class="btn btn-secondary mb-3">← Back</a>


        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>District</th>
                    <th>Area Name</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($areas as $a)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $a->district->name }}</td>
                        <td>{{ $a->area_name }}</td>
                        <td>{{ $a->latitude }}</td>
                        <td>{{ $a->longitude }}</td>
                        <td>
                            <a href="{{ route('admin.coverage.areas.edit', $a->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('admin.coverage.areas.destroy', $a->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection