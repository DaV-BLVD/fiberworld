@extends('admin.layouts.app')

@section('content')
    <div class="container py-4">

        <div class="d-flex justify-content-between mb-4">
            <h3>Add New Hero Slider</h3>
            <a href="{{ route('admin.hero_sliders.index') }}" class="btn btn-secondary">← Back</a>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Create Slider</h4>
            </div>

            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.hero_sliders.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Title --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                    </div>

                    {{-- Description --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Description</label>
                        <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                    </div>

                    {{-- Image --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Slider Image</label>
                        <input type="file" name="image" class="form-control" accept="image/*" onchange="previewImage(event)"
                            required>
                        <img id="image-preview" class="mt-3" style="max-height: 150px; display: none;">
                    </div>

                    {{-- Button 1 --}}
                    {{-- <h5 class="fw-bold mt-4">Button 1</h5>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <input type="text" name="button_text" class="form-control" placeholder="Text"
                                value="{{ old('button_text') }}">
                        </div>
                        <div class="col-md-5">
                            <input type="text" name="button_link" class="form-control" placeholder="Link"
                                value="{{ old('button_link') }}">
                        </div>
                        <div class="col-md-3">
                            <select name="button_type" class="form-select">
                                <option value="primary" {{ old('button_type') == 'primary' ? 'selected' : '' }}>Primary
                                </option>
                                <option value="outline-light" {{ old('button_type') == 'outline-light' ? 'selected' : '' }}>
                                    Outline Light</option>
                                <option value="secondary" {{ old('button_type') == 'secondary' ? 'selected' : '' }}>Secondary
                                </option>
                            </select>
                        </div>
                    </div> --}}

                    {{-- Button 2 --}}
                    {{-- <h5 class="fw-bold mt-4">Button 2</h5>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <input type="text" name="button_text2" class="form-control" placeholder="Text"
                                value="{{ old('button_text2') }}">
                        </div>
                        <div class="col-md-5">
                            <input type="text" name="button_link2" class="form-control" placeholder="Link"
                                value="{{ old('button_link2') }}">
                        </div>
                        <div class="col-md-3">
                            <select name="button_type2" class="form-select">
                                <option value="primary" {{ old('button_type2') == 'primary' ? 'selected' : '' }}>Primary
                                </option>
                                <option value="outline-light" {{ old('button_type2') == 'outline-light' ? 'selected' : '' }}>
                                    Outline Light</option>
                                <option value="secondary" {{ old('button_type2') == 'secondary' ? 'selected' : '' }}>Secondary
                                </option>
                            </select>
                        </div>
                    </div> --}}

                    {{-- Submit --}}
                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-success px-4">Save Slider</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    {{-- Image Preview Script --}}
    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('image-preview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '';
                preview.style.display = 'none';
            }
        }
    </script>

@endsection