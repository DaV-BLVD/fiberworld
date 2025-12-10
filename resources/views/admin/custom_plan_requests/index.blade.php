@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Custom Plan Requests</h2>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body table-responsive p-3">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Full Name</th> {{-- Added Full Name column --}}
                            <th>Speed (Mbps)</th>
                            <th>Data Limit (GB)</th>
                            <th>Unlimited</th>
                            <th>Price (NPR)</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Requested At</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customPlans as $plan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $plan->full_name }}</td> {{-- Display full name --}}
                                <td>{{ $plan->speed }}</td>
                                <td>{{ $plan->unlimited_data ? 'Unlimited' : $plan->data_limit }}</td>
                                <td>{{ $plan->unlimited_data ? 'Yes' : 'No' }}</td>
                                <td>{{ number_format($plan->calculated_price, 2) }}</td>
                                <td>{{ $plan->email ?? '-' }}</td>
                                <td>{{ $plan->phone ?? '-' }}</td>
                                <td>{{ $plan->created_at->format('Y-m-d H:i') }}</td>
                                <td>
                                    <span class="badge 
                                                @if($plan->status == 'pending') bg-warning 
                                                @elseif($plan->status == 'provided') bg-success 
                                                @endif
                                            ">
                                        {{ ucfirst($plan->status) }}
                                    </span>
                                </td>
                                <td class="d-flex gap-1 flex-wrap">
                                    <a href="{{ route('admin.custom_plans.show', $plan->id) }}"
                                        class="btn btn-primary btn-sm">View</a>

                                    <form action="{{ route('admin.custom_plans.destroy', $plan->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Delete this request?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Pagination if needed --}}
                {{-- <div class="mt-3">
                    {{ $customPlans->links() }}
                </div> --}}
            </div>
        </div>
    </div>
@endsection