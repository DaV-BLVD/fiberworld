@extends('admin.layouts.app')

@section('content')
    <div class="ml-4">
        <h3>Add Area</h3>

        <form action="{{ route('admin.coverage.areas.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>District</label>
                <select name="district_id" class="form-select" required>
                    <option disabled>Select District</option>

                    @foreach($districts as $district)
                        <option value="{{ $district->id }}" {{ (isset($selectedDistrict) && $selectedDistrict == $district->id) ? 'selected' : '' }}>
                            {{ $district->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Area Name</label>
                <input type="text" name="area_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Latitude</label>
                <input type="text" name="latitude" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Longitude</label>
                <input type="text" name="longitude" class="form-control" required>
            </div>

            <button class="btn btn-primary">Save</button>

            <a href="{{ route('admin.coverage.areas.index', ['district_id' => $selectedDistrict]) }}"
                class="btn btn-secondary">← Back</a>

        </form>
    </div>
@endsection