@extends('admin.layouts.app')

@section('content')

    <div class="container">
        <h2>Edit FAQ Item</h2>

        <form action="{{ route('admin.plansandpricing.faq.update', $item->id) }}" method="POST">
            @csrf

            <label>Question</label>
            <input type="text" name="question" class="form-control mb-3" value="{{ $item->question }}" required>

            <label>Answer</label>
            <textarea name="answer" class="form-control mb-3" required>{{ $item->answer }}</textarea>

            <label>Active</label>
            <select name="is_active" class="form-control mb-3" required>
                <option value="1" {{ $item->is_active ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !$item->is_active ? 'selected' : '' }}>No</option>
            </select>

            {{-- <label>Sort Order</label>
            <input type="number" name="sort_order" class="form-control mb-3" value="{{ $item->sort_order }}"> --}}

            <button class="btn btn-primary">Update</button>
            <a href="{{ url('/admin/plansandpricing/faq') }}" class="btn btn-warning"><- Back</a>

        </form>
    </div>

@endsection
