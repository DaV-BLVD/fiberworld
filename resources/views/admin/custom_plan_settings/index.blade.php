@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid pb-5">
        <h2>Custom Plan Settings</h2>
        <a href="{{ route('admin.custom_plan_settings.create') }}" class="btn btn-primary mb-3">Add New Setting</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive" style="max-height: 500px; overflow-y: auto; overflow-x: auto;">
            <table class="table table-bordered">
                <thead class="table-light" style="position: sticky; top: 0; z-index: 10;">
                    <tr>
                        <th>#</th>
                        <th>Speed Min</th>
                        <th>Speed Max</th>
                        <th>Speed Step</th>
                        <th>Data Min</th>
                        <th>Data Max</th>
                        <th>Data Step</th>
                        <th>Price per Mbps</th>
                        <th>Price per GB</th>
                        <th>Unlimited Data Price</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($settings as $setting)
                        <tr @if($setting->is_active) class="table-success" @endif>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $setting->speed_min }}</td>
                            <td>{{ $setting->speed_max }}</td>
                            <td>{{ $setting->speed_step }}</td>
                            <td>{{ $setting->data_min }}</td>
                            <td>{{ $setting->data_max }}</td>
                            <td>{{ $setting->data_step }}</td>
                            <td>{{ $setting->price_per_mbps }}</td>
                            <td>{{ $setting->price_per_gb }}</td>
                            <td>{{ $setting->unlimited_data_price }}</td>

                            <td>
                                @if($setting->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <form action="{{ route('admin.custom_plan_settings.activate', $setting->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-sm btn-primary">Set Active</button>
                                    </form>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('admin.custom_plan_settings.edit', $setting->id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('admin.custom_plan_settings.destroy', $setting->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('Delete this setting?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection