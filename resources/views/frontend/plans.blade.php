@extends('frontend.layouts.main')

@section('main-container')

    <link rel="stylesheet" href="{{ url('frontend\plans.css') }}">

    <!-- Page Hero Section -->
    <section class="page-hero-section"  style="background: url('assets/header-images/12.1.png');">
        <div class="container">
            <h1 class="display-4">Find Your Perfect Internet Plan</h1>
            <p class="lead">Blazing-fast speeds, unlimited data, and reliable connections for every need.</p>
        </div>
    </section>

    <!-- Home Internet Plans Section -->
    <section class="pricing-section section-padding" id="homeInternet">
        <div class="container">
            <h2 class="section-title mb-3">Home Internet Plans</h2>
            <p class="text-center lead mb-5">Seamless connectivity for your entire family.</p>

            <div class="row justify-content-center">
                @foreach ($homeService->plans as $plan)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="price-card {{ $plan->is_recommended ? 'recommended' : '' }}">
                            <div>
                                @if($plan->is_recommended)
                                    <span class="badge bg-primary mb-3 py-2 px-3 rounded-pill">Recommended</span>
                                @endif
                                <h4>{{ $plan->name }}</h4>
                                <div class="speed">{{ $plan->speed_mbps }} {{ $plan->speed_unit }}</div>
                                <div class="price">NPR
                                    {{ number_format($plan->price) }}<small>/{{ $plan->billing_period }}</small>
                                </div>

                                <ul>
                                    @foreach ($plan->features as $feature)
                                        <li>
                                            <i
                                                class="bi {{ $feature->is_available ? 'bi-check-circle-fill' : 'bi-x-circle-fill text-secondary' }}"></i>
                                            {{ $feature->feature_text }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <a href="#" class="btn btn-primary btn-md">Select
                                Plan</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- Business Internet Plans Section -->
    <section class="pricing-section section-padding" id="businessInternet">
        <div class="container">
            <h2 class="section-title mb-3">Business Internet Plans</h2>
            <p class="text-center lead mb-5">Powerful solutions for every business size and need.</p>

            <div class="row justify-content-center">
                @foreach ($businessService->plans as $plan)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="price-card {{ $plan->is_recommended ? 'recommended' : '' }}">
                            <div>
                                @if($plan->is_recommended)
                                    <span class="badge bg-primary mb-2">Most Popular</span>
                                @endif
                                <h4>{{ $plan->name }}</h4>
                                <div class="speed">{{ $plan->speed_mbps }} {{ $plan->speed_unit }}</div>
                                <div class="price">NPR
                                    {{ number_format($plan->price) }}<small>/{{ $plan->billing_period }}</small>
                                </div>

                                <ul>
                                    @foreach ($plan->features as $feature)
                                        <li>
                                            <i
                                                class="bi {{ $feature->is_available ? 'bi-check-circle-fill' : 'bi-x-circle-fill text-secondary' }}"></i>
                                            {{ $feature->feature_text }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <a href="#" class="btn btn-primary btn-md">Select
                                Plan</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- Why Choose Us Features -->
    <section class="features-section section-padding">
        <div class="container">

            <h2 class="section-title">Why Choose Fiberworld Communication Pvt. Ltd.?</h2>

            <div class="row text-center">
                @foreach($items as $item)
                    <div class="col-md-4 mb-4">
                        <div class="feature-item">

                            {{-- Icon --}}
                            <div class="icon mb-3">
                                @if($item->icon)
                                    @if(Str::startsWith($item->icon, 'bi '))
                                        {{-- Bootstrap Icon class --}}
                                        <i class="{{ $item->icon }}" style="font-size: 2.5rem;"></i>
                                    @else
                                        {{-- Image file --}}
                                        <img src="{{ asset('storage/' . $item->icon) }}" alt="Icon"
                                            style="width:60px;height:60px;object-fit:contain;">
                                    @endif
                                @else
                                    <i class="bi bi-star-fill" style="font-size: 2.5rem;"></i> {{-- fallback icon --}}
                                @endif
                            </div>

                            {{-- Title --}}
                            <h3>{{ $item->title }}</h3>

                            {{-- Description --}}
                            <p>{{ $item->description }}</p>

                        </div>
                    </div>

                    {{-- Row break after every 3 items --}}
                    @if(($loop->index + 1) % 3 == 0)
                        </div>
                        <div class="row text-center">
                    @endif

                @endforeach
            </div>

        </div>
    </section>



    <!-- FAQ Section -->
    <section class="faq-section section-padding">
        <div class="container">

            <h2 class="section-title">Frequently Asked Questions</h2>

            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <div class="accordion" id="faqAccordion">

                        @foreach($faqs as $index => $faq)
                            <div class="accordion-item">

                                <!-- Header -->
                                <h2 class="accordion-header" id="heading{{ $index }}">
                                    <button class="accordion-button @if($index !== 0) collapsed @endif" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
                                        aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                        aria-controls="collapse{{ $index }}">

                                        {{ $faq->question }}
                                    </button>
                                </h2>

                                <!-- Body -->
                                <div id="collapse{{ $index }}" class="accordion-collapse collapse @if($index === 0) show @endif"
                                    aria-labelledby="heading{{ $index }}" data-bs-parent="#faqAccordion">

                                    <div class="accordion-body">
                                        {!! nl2br(e($faq->answer)) !!}
                                    </div>
                                </div>

                            </div>
                        @endforeach

                    </div>

                </div>
            </div>

        </div>
    </section>


    <!-- Call to Action / Contact Section -->
    <section class="cta-section">
        <div class="container">
            <h2 class="display-5 fw-bold mb-4">Ready to Upgrade Your Internet?</h2>
            <p class="lead mb-4">Our team is here to help you choose the perfect plan and get you connected seamlessly.
            </p>
            <a href="{{ url('/contact') }}" class="btn btn-light btn-lg me-3"><i class="bi bi-telephone-fill me-2"></i>
                Contact Sales</a>
            <a href="{{ url('/coverage') }}" class="btn btn-outline-light btn-lg"><i class="bi bi-map-fill me-2"></i> Check
                Availability</a>
        </div>
    </section>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>

@endsection