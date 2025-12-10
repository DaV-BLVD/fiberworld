@extends('admin.layouts.app')

@section('content')

    <div class="container">
        <h2>Add New Why FiberWorld Item</h2>

        <form action="{{ route('admin.plansandpricing.whyfiberworld.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label>Upload Icon Image</label>
            <input type="file" name="icon_image" class="form-control mb-2">

            <label>Or Enter Bootstrap Icon Class</label>
            <input type="text" name="icon_class" class="form-control mb-3" placeholder="e.g. bi bi-speedometer2">

            <label>Title</label>
            <input type="text" name="title" class="form-control mb-3">

            <label>Description</label>
            <textarea name="description" class="form-control mb-3"></textarea>

            <label>Active</label>
            <select name="is_active" class="form-control mb-3">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>

            <button class="btn btn-primary">Save</button>
            <a href="{{ url('/admin/plansandpricing/whyfiberworld') }}" class="btn btn-warning"><- Back</a>

        </form>
    </div>

@endsection