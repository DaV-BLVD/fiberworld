@extends('admin.layouts.app')

@section('content')
<div class="container pb-5">
    <h2>Edit Custom Plan Setting</h2>

    <form action="{{ route('admin.custom_plan_settings.update', $customPlanSetting->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Speed Min (Mbps)</label>
            <input type="number" name="speed_min" class="form-control" value="{{ old('speed_min', $customPlanSetting->speed_min) }}" required>
        </div>

        <div class="mb-3">
            <label>Speed Max (Mbps)</label>
            <input type="number" name="speed_max" class="form-control" value="{{ old('speed_max', $customPlanSetting->speed_max) }}" required>
        </div>

        <div class="mb-3">
            <label>Speed Step (Mbps)</label>
            <input type="number" name="speed_step" class="form-control" value="{{ old('speed_step', $customPlanSetting->speed_step) }}" required>
        </div>

        <div class="mb-3">
            <label>Data Min (GB)</label>
            <input type="number" name="data_min" class="form-control" value="{{ old('data_min', $customPlanSetting->data_min) }}" required>
        </div>

        <div class="mb-3">
            <label>Data Max (GB)</label>
            <input type="number" name="data_max" class="form-control" value="{{ old('data_max', $customPlanSetting->data_max) }}" required>
        </div>

        <div class="mb-3">
            <label>Data Step (GB)</label>
            <input type="number" name="data_step" class="form-control" value="{{ old('data_step', $customPlanSetting->data_step) }}" required>
        </div>

        <div class="mb-3">
            <label>Price per Mbps</label>
            <input type="number" step="0.01" name="price_per_mbps" class="form-control" value="{{ old('price_per_mbps', $customPlanSetting->price_per_mbps) }}" required>
        </div>

        <div class="mb-3">
            <label>Price per GB</label>
            <input type="number" step="0.01" name="price_per_gb" class="form-control" value="{{ old('price_per_gb', $customPlanSetting->price_per_gb) }}" required>
        </div>

        <div class="mb-3">
            <label>Unlimited Data Price</label>
            <input type="number" step="0.01" name="unlimited_data_price" class="form-control" value="{{ old('unlimited_data_price', $customPlanSetting->unlimited_data_price) }}" required>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="is_active" value="1" class="form-check-input" id="is_active"
                {{ $customPlanSetting->is_active ? 'checked' : '' }}>
            <label class="form-check-label" for="is_active">Set as Active</label>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ url('/admin/custom-plan-settings') }}" class="btn btn-warning"><- Back</a>
    </form>
</div>
@endsection
