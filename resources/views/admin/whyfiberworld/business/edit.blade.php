@extends('admin.layouts.app')

@section('content')

    <div class="container">
        <h2>Edit Why FiberWorld Item</h2>

        <form action="{{ route('admin.whyfiberworld.business.update', $item->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf

            <label>Current Icon</label><br>
            @if($item->icon)
                @if(Str::startsWith($item->icon, 'bi '))
                    {{-- Bootstrap Icon --}}
                    <i class="{{ $item->icon }}" style="font-size:50px;"></i>
                @else
                    {{-- Image --}}
                    <img src="{{ asset('storage/' . $item->icon) }}" width="80" alt="Icon">
                @endif
                <br><br>
            @endif

            <label>Or Enter Bootstrap Icon Class</label>
            <input type="text" name="icon_class" class="form-control mb-3" placeholder="e.g. bi bi-speedometer2"
                value="{{ Str::startsWith($item->icon, 'bi ') ? $item->icon : '' }}">

            <label>Title</label>
            <input type="text" name="title" class="form-control mb-3" value="{{ $item->title }}">

            <label>Description</label>
            <textarea name="description" class="form-control mb-3">{{ $item->description }}</textarea>

            <label>Active</label>
            <select name="is_active" class="form-control mb-3">
                <option value="1" {{ $item->is_active ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !$item->is_active ? 'selected' : '' }}>No</option>
            </select>

            <button class="btn btn-primary">Update</button>
            <a href="{{ url('/admin/whyfiberworld/business') }}" class="btn btn-warning"><- Back</a>

        </form>
    </div>

@endsection