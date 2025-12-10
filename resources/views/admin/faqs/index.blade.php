@extends('admin.layouts.app')

@section('content')
    <div class="container">

        <h2>Category: {{ $category->name }}</h2>

        <a href="{{ route('admin.faq-categories.index') }}" class="btn btn-secondary mb-3">Back</a>

        {{-- Add FAQ Form --}}
        <div class="card mb-2">
            <div class="card-header">
                Add FAQ to "{{ $category->name }}"
            </div>

            <div class="card-body">
                <form action="{{ route('admin.faqs.store', $category->id) }}" method="POST">
                    @csrf

                    <input type="hidden" name="faq_category_id" value="{{ $category->id }}">

                    <div class="form-group">
                        <label>Question</label>
                        <input type="text" name="question" class="form-control" required>
                    </div>

                    <div class="form-group mt-1">
                        <label>Answer</label>
                        <textarea name="answer" class="form-control" rows="4" required></textarea>
                    </div>

                    <button class="btn btn-success mt-1">Add FAQ</button>
                </form>
            </div>
        </div>

        {{-- FAQ List --}}
        <h4>FAQs</h4>

        @if($category->faqs->count() == 0)
            <p>No FAQs in this category yet.</p>
        @endif

        <ul class="list-group">
            @foreach($category->faqs as $faq)
                <li class="list-group-item d-flex justify-content-between align-items-center">

                    <div>
                        <strong>Q:</strong> {{ $faq->question }} <br>
                        <strong>A:</strong> {{ $faq->answer }}
                    </div>

                    <div>
                        <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="btn btn-warning btn-sm">Edit</a>


                        <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete this question?')">Delete</button>
                        </form>
                    </div>

                </li>
            @endforeach
        </ul>

    </div>
@endsection