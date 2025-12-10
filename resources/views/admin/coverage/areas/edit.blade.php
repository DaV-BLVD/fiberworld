@extends('admin.layouts.app')

@section('content')
    <div class="ml-4">
        <h3>Edit Area</h3>

        <form action="{{ route('admin.coverage.areas.update', $area->id) }}" method="POST">
            @csrf @method('PUT')

            <div class="mb-3">
                <label>Select District</label>
                <select name="district_id" class="form-control">
                    @foreach($districts as $d)
                        <option value="{{ $d->id }}" {{ $area->district_id == $d->id ? 'selected' : '' }}>
                            {{ $d->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Area Name</label>
                <input type="text" name="area_name" value="{{ $area->area_name }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Latitude</label>
                <input type="text" name="latitude" value="{{ $area->latitude }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Longitude</label>
                <input type="text" name="longitude" value="{{ $area->longitude }}" class="form-control" required>
            </div>

            <button class="btn btn-primary">Update</button>

            <a href="{{ route('admin.coverage.areas.index', ['district_id' => $area->district_id]) }}"
                class="btn btn-secondary mt-2">← Back</a>

        </form>
    </div>
@endsection