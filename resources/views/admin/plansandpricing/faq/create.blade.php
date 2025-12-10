@extends('admin.layouts.app')

@section('content')

    <div class="container">
        <h2>Add New FAQ Item</h2>

        <form action="{{ route('admin.plansandpricing.faq.store') }}" method="POST">
            @csrf

            <label>Question</label>
            <input type="text" name="question" class="form-control mb-3" required>

            <label>Answer</label>
            <textarea name="answer" class="form-control mb-3" required></textarea>

            <label>Active</label>
            <select name="is_active" class="form-control mb-3" required>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>

            <button class="btn btn-primary">Save</button>
            <a href="{{ url('/admin/plansandpricing/faq') }}" class="btn btn-warning"><- Back</a>

        </form>
    </div>

@endsection
