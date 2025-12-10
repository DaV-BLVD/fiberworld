@extends('frontend.layouts.main')

@section('main-container')
    <link rel="stylesheet" href="{{ url('frontend\home_internet.css') }}">

    <!-- Home Internet Hero Section -->
    <section class="home-internet-hero" style="background: url('assets/header-images/5.1.png')">
        <div class="container">
            <h1 class="display-4">Blazing-Fast Home Internet for Every Nepali Household</h1>
            <p class="lead">Stream, game, work, and connect with loved ones without interruption. Fiberworld
                Communication Pvt. Ltd. brings the digital world to your doorstep.</p>
            <a href="#plans" class="home_internet_btn">View Home Plans</a>
            <a href="{{ url('/') }}#coverage" class="home_internet_btn2">Check Availability</a>
        </div>
    </section>

    <!-- Why Choose Us for Home Internet -->

    <section class="section-padding bg-light">
        <div class="container">
            <h2 class="section-title">Why Fiberworld Communication Pvt. Ltd. for Your Home?</h2>

            <div class="row text-center">
                @foreach ($items as $item)
                    <div class="col-md-4 mb-4">
                        <div class="feature-box p-3 h-100">
                            <div class="icon mb-2">

                                @if(Str::startsWith($item->icon, 'bi '))
                                    {{-- ICON CLASS --}}
                                    <i class="{{ $item->icon }}" style="font-size:50px;"></i>
                                @else
                                    {{-- IMAGE FILE --}}
                                    <img src="{{ asset('storage/' . $item->icon) }}" alt="{{ $item->title }}"
                                        style="width:50px; height:auto;">
                                @endif

                            </div>

                            <h3>{{ $item->title }}</h3>
                            <p>{{ $item->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- Home Internet Plans Section -->
    <section id="plans" class="section-padding">
        <div class="container">
            <h2 class="section-title">Our Home Internet Plans</h2>
            <p class="text-center lead mb-5">Find the perfect speed and value for your household.</p>
            <div class="row justify-content-center">
                @foreach($service->plans as $plan)
                    <div class="col-lg-4 col-md-6 mb-5">
                        <div class="price-card {{ $plan->is_recommended ? 'recommended' : '' }}">
                            <div>
                                @if($plan->is_recommended)
                                    <span class="badge bg-primary mb-2">Most Popular</span>
                                @endif
                                <h4>{{ $plan->name }}</h4>
                                <div class="speed">{{ $plan->speed_mbps }} {{ $plan->speed_unit }}</div>
                                <div class="price">{{ $plan->currency }}
                                    {{ number_format($plan->price) }}<small>/{{ $plan->billing_period }}</small>
                                </div>
                                <ul>
                                    @foreach($plan->features as $feature)
                                        <li>
                                            <i
                                                class="bi {{ $feature->is_available ? 'bi-check-circle-fill' : 'bi-x-circle-fill text-secondary' }}"></i>
                                            {{ $feature->feature_text }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <a href="#" class="btn btn-primary btn-lg">Select Plan</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <p class="text-center mt-5 text-muted">Prices are inclusive of all taxes. Fair Usage Policy applies. Additional
                terms may apply.</p>
        </div>
    </section>


    <!-- How it Works Section -->
    <section class="section-padding bg-light">
        <div class="container">
            <h2 class="section-title">Getting Connected is Easy!</h2>
            <div class="row">
                <div class="col-md-4 how-it-works-step">
                    <div class="icon"><i class="bi bi-1-circle"></i></div>
                    <h3>Choose Your Plan</h3>
                    <p>Select the home internet package that best fits your speed and budget requirements.</p>
                </div>
                <div class="col-md-4 how-it-works-step">
                    <div class="icon"><i class="bi bi-2-circle"></i></div>
                    <h3>Schedule Installation</h3>
                    <p>Our friendly team will contact you to arrange a convenient time for installation.</p>
                </div>
                <div class="col-md-4 how-it-works-step">
                    <div class="icon"><i class="bi bi-3-circle"></i></div>
                    <h3>Enjoy Fast Internet!</h3>
                    <p>Our technicians will set everything up, and you'll be online in no time.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Home Internet FAQ -->
    <section class="section-padding">
        <div class="container">
            <h2 class="section-title">Frequently Asked Questions</h2>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="homeInternetFAQ">
                        @foreach($faqs as $index => $faq)
                            @if($faq->is_active)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $index }}">
                                        <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
                                            aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                            aria-controls="collapse{{ $index }}">
                                            {{ $faq->question }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $index }}"
                                        class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                        aria-labelledby="heading{{ $index }}" data-bs-parent="#homeInternetFAQ">
                                        <div class="accordion-body">
                                            {!! nl2br(e($faq->answer)) !!}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Call to Action / Contact Section (Same as Homepage) -->
    <section class="cta-section bg-primary text-white text-center section-padding">
        <div class="container">
            <h2 class="display-5 fw-bold mb-4">Ready to Get Connected?</h2>
            <p class="lead mb-5">Contact us today to find the perfect home internet plan for your family.</p>
            <a href="#" class="btn btn-light btn-lg me-3"><i class="bi bi-telephone-fill me-2"></i> Call
                Sales</a>
            <a href="{{ url('/') }}#coverage" class="btn btn-outline-light btn-lg"><i
                    class="bi bi-check-circle-fill me-2"></i> Check
                Availability</a>
        </div>
    </section>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
@endsection