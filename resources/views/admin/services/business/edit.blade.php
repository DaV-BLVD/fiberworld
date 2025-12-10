@extends('admin.layouts.app')

@section('content')
    <div class="container pb-5">
        <h2>Edit Business Internet Plan: {{ $plan->name }}</h2>

        <form action="{{ route('admin.services.business.update', $plan->id) }}" method="POST">
            @csrf
            @method("PUT")
            <input type="hidden" name="sort_order" value="{{ $plan->sort_order }}">

            <div class="row">
                <div class="col-md-6">
                    <label>Plan Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $plan->name }}" required>

                    <label class="mt-3">Speed</label>
                    <input type="number" name="speed_mbps" class="form-control" value="{{ $plan->speed_mbps }}" required>

                    <label class="mt-3">Speed Unit</label>
                    <select name="speed_unit" class="form-control">
                        <option value="Mbps" {{ $plan->speed_unit == 'Mbps' ? 'selected' : '' }}>Mbps</option>
                        <option value="Gbps" {{ $plan->speed_unit == 'Gbps' ? 'selected' : '' }}>Gbps</option>
                    </select>

                    <label class="mt-3">Price</label>
                    <input type="number" step="0.01" name="price" class="form-control" value="{{ $plan->price }}" required>

                    <label class="mt-3">Currency</label>
                    <input type="text" name="currency" class="form-control" value="{{ $plan->currency }}" required>

                    <label class="mt-3">Billing Period</label>
                    <select name="billing_period" class="form-control">
                        <option value="month" {{ $plan->billing_period == 'month' ? 'selected' : '' }}>Month</option>
                        <option value="monthly" {{ $plan->billing_period == 'monthly' ? 'selected' : '' }}>Monthly</option>
                        <option value="year" {{ $plan->billing_period == 'year' ? 'selected' : '' }}>Year</option>
                    </select>

                    <label class="mt-3">Recommended?</label>
                    <input type="checkbox" name="is_recommended" value="1" {{ $plan->is_recommended ? 'checked' : '' }}>

                    <label class="mt-3">Active?</label>
                    <input type="checkbox" name="is_active" value="1" {{ $plan->is_active ? 'checked' : '' }}>
                </div>
            </div>

            <hr>

            <h4>Plan Features</h4>

            <div id="feature-container">
                <!-- JS will load existing features -->
            </div>

            <button type="button" class="btn btn-secondary mt-2" onclick="addFeatureRow()">+ Add Feature</button>

            <hr>

            <button type="submit" class="btn btn-primary">Update Plan</button>
            <a href="{{ route('admin.services.business.index') }}" class="btn btn-warning">Cancel</a>

        </form>
    </div>

    <script>
        function addFeatureRow(text = '', available = false) {
            const container = document.getElementById('feature-container');

            const row = document.createElement('div');
            row.classList.add('row', 'mt-2');

            row.innerHTML = `
                    <div class="col-md-6">
                        <input type="text" name="features[]" class="form-control" placeholder="Feature name"
                               value="${text}" required>
                    </div>

                    <div class="col-md-3">
                        <label>
                            <input type="checkbox" name="is_available[]" value="1" ${available ? 'checked' : ''}>
                            Available
                        </label>
                    </div>

                    <div class="col-md-3">
                        <button type="button" class="btn btn-danger"
                                onclick="this.closest('.row').remove()">Remove</button>
                    </div>
                `;

            container.appendChild(row);
        }

        // Load existing features
        @foreach($plan->features as $feature)
            addFeatureRow(
                "{{ $feature->feature_text }}",
                {{ $feature->is_available ? 'true' : 'false' }}
            );
        @endforeach
    </script>
@endsection