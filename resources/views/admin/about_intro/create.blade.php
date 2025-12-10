@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h3>Add About Intro</h3>

        <form action="{{ route('admin.about_intro.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <h5>Paragraphs</h5>
            <div id="paragraph-container">
                <div class="mb-3">
                    <textarea name="paragraphs[]" class="form-control" rows="3"></textarea>
                </div>
            </div>

            <button type="button" class="btn btn-secondary mb-3" onclick="addParagraph()">Add More Paragraph</button>

            <button class="btn btn-success">Save</button>
        </form>
    </div>

    <script>
        function addParagraph() {
            const container = document.getElementById("paragraph-container");
            container.insertAdjacentHTML('beforeend', `
            <div class="mb-3">
                <textarea name="paragraphs[]" class="form-control" rows="3"></textarea>
            </div>
        `);
        }
    </script>
@endsection