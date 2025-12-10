@extends('frontend.layouts.main')

@section('main-container')
    <link rel="stylesheet" href="{{ url('frontend\business_internet.css') }}">

    <!-- Business Internet Hero Section -->
    <section class="business-internet-hero" style="background: url('assets/header-images/6.1.png')">
        <div class="container">
            <h1 class="display-4">Reliable & High-Performance Internet for Your Business</h1>
            <p class="lead">Empower your operations with secure, fast, and dedicated internet solutions from
                Fiberworld Communication Pvt. Ltd..</p>
            <a href="#plans" class="business_internet_btn">View Business Plans</a>
            <a href="{{ url('/contact') }}#contactForm" class="business_internet_btn2">Get a Custom Quote</a>
        </div>
    </section>

    <!-- Why Choose Digitech for Business -->
    <section class="section-padding bg-light">
        <div class="container">
            <h2 class="section-title">Why Fiberworld Communication Pvt. Ltd. for Your Home?</h2>

            <div class="row text-center">
                @foreach ($items as $item)
                    <div class="col-md-4 mb-4">
                        <div class="feature-box p-3 h-100">
                            <div class="icon mb-2">
                                @if($item->icon)
                                    @php
                                        $icon = $item->icon;
                                    @endphp

                                    @if(Str::startsWith($icon, 'bi '))
                                        {{-- Bootstrap Icon class --}}
                                        <i class="{{ $icon }}" style="font-size:50px;"></i>
                                    @else
                                        {{-- Image file --}}
                                        <img src="{{ asset('storage/' . $icon) }}" alt="{{ $item->title }}"
                                            style="width:50px; height:auto;">
                                    @endif
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


    <!-- Business Internet Plans Section -->
    <section id="plans" class="section-padding">
        <div class="container">
            <h2 class="section-title">Our Business Internet Plans</h2>
            <p class="text-center lead mb-5">Powerful solutions for every business size and need.</p>
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
            <p class="text-center mt-5 text-muted">All plans are symmetric (equal upload/download speeds). Custom solutions
                available.</p>
        </div>
    </section>




    {{-- inquire buttom for backend --}}

    <!-- Value-Added Services -->
    <section class="section-padding bg-light">
        <div class="container">
            <h2 class="section-title">Enhance Your Business Connectivity</h2>
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="value-added-card">
                        <div class="icon"><i class="bi bi-cloud-fill"></i></div>
                        <h3>Cloud Connectivity</h3>
                        <p>Direct, secure, and high-speed connections to major cloud providers for your mission-critical
                            applications.</p>
                        <a href="{{ url('/get_started') }}" class="btn btn-outline-primary mt-3">Inquire</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="value-added-card">
                        <div class="icon"><i class="bi bi-shield-fill-check"></i></div>
                        <h3>Custom VPN Solutions</h3>
                        <p>Securely connect your branch offices or remote workers with tailored Virtual Private Network
                            services.</p>
                        <a href="{{ url('/get_started') }}" class="btn btn-outline-primary mt-3">Inquire</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="value-added-card">
                        <div class="icon"><i class="bi bi-wifi"></i></div>
                        <h3>Managed Wi-Fi</h3>
                        <p>Let us manage your office Wi-Fi network for optimal performance, security, and coverage.</p>
                        <a href="{{ url('/get_started') }}" class="btn btn-outline-primary mt-3">Inquire</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Business Testimonials / Case Studies -->
    <section class="section-padding">
        <div class="container">
            <h2 class="section-title">Trusted by Leading Businesses</h2>
            <div id="businessTestimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="testimonial-card">
                                    <blockquote>
                                        "Fiberworld Communication Pvt. Ltd.'s Business Pro plan has been instrumental in
                                        our daily operations. The consistent speeds and quick support are unmatched."
                                    </blockquote>
                                    <p class="customer-name">- CEO, Global Innovations</p>
                                    <p class="customer-info">IT & Software Development</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="testimonial-card">
                                    <blockquote>
                                        "Reliability is key for our e-commerce platform. Fiberworld Communication Pvt.
                                        Ltd. provides the stability we need, 24/7."
                                    </blockquote>
                                    <p class="customer-name">- Operations Manager, E-Shop Nepal</p>
                                    <p class="customer-info">E-commerce Solutions</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#businessTestimonialCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#businessTestimonialCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>


    <!-- Call to Action / Contact Section (Adjusted for Business) -->
    <section class="cta-section bg-primary text-white text-center section-padding">
        <div class="container">
            <h2 class="display-5 fw-bold mb-4">Ready for a Business-Grade Connection?</h2>
            <p class="lead mb-5">Let's discuss your specific requirements and find the perfect solution for your
                company.</p>
            <a href="#" class="btn btn-light btn-lg me-3"><i class="bi bi-telephone-fill me-2"></i> Call Business Sales</a>
            <a href="{{ url('/contact') }}#contactForm" class="btn btn-outline-light btn-lg"><i
                    class="bi bi-envelope-fill me-2"></i> Request a Quote</a>
        </div>
    </section>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
@endsection