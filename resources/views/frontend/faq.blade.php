@extends('frontend.layouts.main')

@section('main-container')
    <link rel="stylesheet" href="{{ url('frontend\faq.css') }}">

    <!-- Page Hero Section -->
    <section class="page-hero-section"  style="background: url('assets/header-images/qwertyuiop.png')">
        <div class="container">
            <h1 class="display-4">Frequently Asked Questions</h1>
            <p class="lead">Find quick answers to common questions about our services, billing, and support.</p>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-content-section section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">

                    @foreach ($categories as $category)
                        <h2 class="section-title @if(!$loop->first) mt-5 @endif">
                            {{ $category->name }}
                        </h2>

                        <div class="accordion" id="accordionCategory{{ $category->id }}">

                            @foreach ($category->faqs as $faq)
                                @php
                                    $itemId = $category->id . '-' . $faq->id;
                                @endphp

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $itemId }}">
                                        <button class="accordion-button @if(!$loop->first) collapsed @endif" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse{{ $itemId }}"
                                            aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                            aria-controls="collapse{{ $itemId }}">
                                            {{ $faq->question }}
                                        </button>
                                    </h2>

                                    <div id="collapse{{ $itemId }}"
                                        class="accordion-collapse collapse @if($loop->first) show @endif"
                                        aria-labelledby="heading{{ $itemId }}"
                                        data-bs-parent="#accordionCategory{{ $category->id }}">

                                        <div class="accordion-body">
                                            {!! nl2br(e($faq->answer)) !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            @if($category->faqs->count() == 0)
                                <p class="text-muted">No FAQs added for this category yet.</p>
                            @endif

                        </div>
                    @endforeach

                    <p class="text-center mt-5 lead text-muted">
                        Still have questions? Don't hesitate to
                        <a href="{{ url('/contact') }}" class="text-primary fw-bold">contact our support team</a>
                        directly.
                    </p>
                </div>
            </div>
        </div>
    </section>


    <!-- Call to Action / Contact Section -->
    <section class="cta-section">
        <div class="container">
            <h2 class="display-5 fw-bold mb-4">Need More Help?</h2>
            <p class="lead mb-4">Our dedicated support team is always ready to assist you.</p>
            <a href="{{ url('/contact') }}" class="btn btn-light btn-lg me-3"><i class="bi bi-headset me-2"></i> Contact
                Support</a>
            <a href="{{ url('/report_issue') }}" class="btn btn-outline-light btn-lg"><i
                    class="bi bi-file-earmark-text me-2"></i>
                Report an Issue</a>
        </div>
    </section>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
@endsection