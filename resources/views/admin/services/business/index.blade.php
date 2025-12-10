@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Business Plans</h2>
        <a href="{{ route('admin.services.business.create') }}" class="btn btn-primary">Add New Plan</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body table-responsive p-3">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th style="width:5%">SN</th>
                        <th style="width:20%">Name</th>
                        <th style="width:15%">Speed</th>
                        <th style="width:10%">Price</th>
                        <th style="width:40%">Features</th>
                        <th style="width:10%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($plans as $index => $plan)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $plan->name }}</td>
                            <td>{{ $plan->speed_mbps }} {{ $plan->speed_unit }}</td>
                            <td>{{ $plan->price }} {{ $plan->currency }}</td>
                            <td>
                                @foreach($plan->features as $feature)
                                    <div>
                                        @if($feature->is_available)
                                            <span style="color:green;">✔</span>
                                        @else
                                            <span style="color:red;">✖</span>
                                        @endif
                                        {{ $feature->feature_text }}
                                    </div>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('admin.services.business.edit', $plan->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('admin.services.business.destroy', $plan->id) }}" method="POST" style="display:inline-block;">
                                    @csrf 
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete plan?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Pagination --}}
            {{-- <div class="mt-3">
                {{ $plans->links() }}
            </div> --}}
        </div>
    </div>
</div>
@endsection
