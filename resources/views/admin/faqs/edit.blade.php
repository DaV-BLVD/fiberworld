@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Edit FAQ</h3>

                    <a href="{{ route('admin.faq-categories.show', $faq->faq_category_id) }}"
                        class="btn btn-secondary btn-sm">
                        Back
                    </a>
                </div>

                <div class="card-body">

                    {{-- ERROR MESSAGES --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.faqs.update', $faq->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- CATEGORY --}}
                        <div class="form-group">
                            <label>Category</label>
                            <select name="faq_category_id" class="form-control" required>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ $faq->faq_category_id == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- QUESTION --}}
                        <div class="form-group mt-3">
                            <label>Question</label>
                            <input type="text" name="question" class="form-control"
                                value="{{ old('question', $faq->question) }}" required>
                        </div>

                        {{-- ANSWER --}}
                        <div class="form-group mt-3">
                            <label>Answer</label>
                            <textarea name="answer" class="form-control" rows="5"
                                required>{{ old('answer', $faq->answer) }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">
                            Update FAQ
                        </button>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection