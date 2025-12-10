@extends('admin.layouts.app')

@section('content')
    <div class="container py-4">

        <div class="d-flex justify-content-between mb-3">
            <h4>Edit About Intro</h4>
            <a href="{{ route('admin.about_intro.index') }}" class="btn btn-secondary">
                ← Back
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Edit About Intro</h4>
            </div>

            <div class="card-body">

                <form action="{{ route('admin.about_intro.update', $about_intro->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-bold">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $about_intro->title }}" required>
                    </div>

                    <h5 class="fw-bold mt-4">Paragraphs</h5>

                    <div id="paragraph-container" class="mt-3">

                        @foreach($about_intro->paragraphs as $index => $p)
                            <div class="mb-3 paragraph-item p-3 border rounded bg-light d-flex gap-3 align-items-start">
                                <div class="fw-bold pt-1" style="width: 35px;">
                                    {{ $index + 1 }}.
                                </div>

                                <textarea name="paragraphs[]" class="form-control" rows="3">{{ $p->paragraph }}</textarea>

                                <button type="button" class="btn btn-danger btn-sm ms-2" onclick="deleteParagraph(this)">
                                    &times;
                                </button>
                            </div>
                        @endforeach

                    </div>

                    <button type="button" class="btn btn-outline-primary mb-3" onclick="addParagraph()">
                        <i class="fe fe-plus"></i> Add More Paragraph
                    </button>

                    <div class="text-end">
                        <button class="btn btn-success px-4">Update</button>
                    </div>

                </form>

            </div>
        </div>

    </div>

    <script>
        function addParagraph() {
            const container = document.getElementById("paragraph-container");
            const items = container.querySelectorAll('.paragraph-item');
            const newIndex = items.length + 1;

            container.insertAdjacentHTML('beforeend', `
            <div class="mb-3 paragraph-item p-3 border rounded bg-light d-flex gap-3 align-items-start">
                <div class="fw-bold pt-1" style="width: 35px;">
                    ${newIndex}.
                </div>

                <textarea name="paragraphs[]" class="form-control" rows="3"></textarea>

                <button type="button" class="btn btn-danger btn-sm ms-2" onclick="deleteParagraph(this)">
                    &times;
                </button>
            </div>
        `);

            updateSerialNumbers();
        }

        function deleteParagraph(btn) {
            btn.closest('.paragraph-item').remove();
            updateSerialNumbers();
        }

        function updateSerialNumbers() {
            const items = document.querySelectorAll('#paragraph-container .paragraph-item');
            items.forEach((item, index) => {
                item.querySelector('div.fw-bold').textContent = (index + 1) + '.';
            });
        }
    </script>

@endsection