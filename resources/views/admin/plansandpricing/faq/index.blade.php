@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>FAQ List</h2>
        <a href="{{ route('admin.plansandpricing.faq.create') }}" class="btn btn-primary">Add New</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body table-responsive p-3">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th style="width:30%">Question</th>
                        <th style="width:35%">Answer</th>
                        <th style="width:10%">Active</th>
                        <th style="width:15%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->question }}</td>
                            <td>{{ Str::limit($item->answer, 100) }}</td>
                            <td>{{ $item->is_active ? 'Yes' : 'No' }}</td>
                            <td>
                                <a href="{{ route('admin.plansandpricing.faq.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                    Edit
                                </a>

                                <form action="{{ route('admin.plansandpricing.faq.delete', $item->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this FAQ?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Pagination --}}
            {{-- <div class="mt-3">
                {{ $items->links() }}
            </div> --}}
        </div>
    </div>
</div>
@endsection
