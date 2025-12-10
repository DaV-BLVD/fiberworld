@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="card shadow-sm border-0">
        <div class="card-body">

            {{-- Header with Action Button --}}
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="m-0">About Intro</h3>

                @if($intro)
                    <a href="{{ route('admin.about_intro.edit', $intro->id) }}" class="btn btn-warning btn-sm">
                        <i class="fe fe-edit"></i> Edit
                    </a>
                @else
                    <a href="{{ route('admin.about_intro.create') }}" class="btn btn-primary btn-sm">
                        <i class="fe fe-plus"></i> Add Intro
                    </a>
                @endif
            </div>

            {{-- Success Message --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Intro Content --}}
            @if($intro)
                {{-- Title --}}
                <div class="mb-4">
                    <h2 class="fw-bold text-primary">{{ $intro->title }}</h2>
                </div>

                {{-- Paragraphs --}}
                <div class="list-group">
                    @foreach($intro->paragraphs as $p)
                        <div class="list-group-item py-3">
                            <p class="mb-0">{{ $p->paragraph }}</p>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-info">
                    No intro content found. Please create one.
                </div>
            @endif

        </div>
    </div>
</div>
@endsection
