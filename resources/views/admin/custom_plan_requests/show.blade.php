@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h2>Custom Plan Request Details</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('admin.custom_plans.index') }}" class="btn btn-secondary mb-3">Back</a>

        <div class="card mb-3">
            <div class="card-body">

                <p><strong>Full Name:</strong> {{ $customPlan->full_name }}</p> {{-- Added Full Name --}}

                <p><strong>Speed:</strong> {{ $customPlan->speed }} Mbps</p>

                <p><strong>Data Limit:</strong>
                    @if($customPlan->unlimited_data)
                        Unlimited
                    @else
                        {{ $customPlan->data_limit }} GB
                    @endif
                </p>

                <p><strong>Unlimited Data:</strong>
                    {{ $customPlan->unlimited_data ? 'Yes' : 'No' }}
                </p>

                <p><strong>Calculated Price:</strong> Rs. {{ number_format($customPlan->calculated_price, 2) }}</p>

                <p><strong>Email:</strong> {{ $customPlan->email ?? '-' }}</p>

                <p><strong>Phone:</strong> {{ $customPlan->phone ?? '-' }}</p>

                <p><strong>Status:</strong>
                    <span class="badge
                                @if($customPlan->status == 'pending') bg-warning
                                @elseif($customPlan->status == 'provided') bg-success
                                @endif">
                        {{ ucfirst($customPlan->status) }}
                    </span>
                </p>

                {{-- Update Status --}}
                <form action="{{ route('admin.custom_plans.updateStatus', $customPlan->id) }}" method="POST" class="mt-3">
                    @csrf

                    <select name="status" class="form-select w-auto d-inline-block">
                        <option value="pending" {{ $customPlan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="provided" {{ $customPlan->status == 'provided' ? 'selected' : '' }}>Provided</option>
                    </select>

                    <button class="btn btn-success btn-sm">Update Status</button>
                </form>

            </div>
        </div>
    </div>
@endsection