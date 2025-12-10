@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Plans and Pricing - Why FiberWorld Items</h2>
            <a href="{{ route('admin.plansandpricing.whyfiberworld.create') }}" class="btn btn-primary">Add New</a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body table-responsive p-3">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th style="width:10%">Icon</th>
                            <th style="width:25%">Title</th>
                            <th style="width:40%">Description</th>
                            <th style="width:10%">Active</th>
                            <th style="width:15%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td class="text-center">
                                    @if($item->icon)
                                        @if(Str::startsWith($item->icon, 'bi '))
                                            {{-- Bootstrap Icon --}}
                                            <i class="{{ $item->icon }}" style="font-size: 30px;"></i>
                                        @else
                                            {{-- Image --}}
                                            <img src="{{ asset('storage/' . $item->icon) }}" width="50" alt="Icon">
                                        @endif
                                    @endif
                                </td>
                                <td>{{ $item->title }}</td>
                                <td>{{ Str::limit($item->description, 80) }}</td>
                                <td>{{ $item->is_active ? 'Yes' : 'No' }}</td>
                                <td>
                                    <a href="{{ route('admin.plansandpricing.whyfiberworld.edit', $item->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>

                                    <form action="{{ route('admin.plansandpricing.whyfiberworld.delete', $item->id) }}"
                                        method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Delete this item?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Pagination placeholder --}}
                {{-- <div class="mt-3">
                    {{ $items->links() }}
                </div> --}}
            </div>
        </div>
    </div>
@endsection