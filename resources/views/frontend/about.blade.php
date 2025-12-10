@extends('frontend.layouts.main')

@section('main-container')
    <link rel="stylesheet" href="{{ url('frontend\about.css') }}">

    <!-- Page Hero Section -->
    <section class="page-hero" style="background: url('assets/header-images/kalshf.png')">
        <div class="container">
            <h1 class="display-4">About Fiberworld Communication Pvt. Ltd.</h1>
        </div>
    </section>

    <!-- Introduction Section -->
    <section class="about-intro-section section-padding">   
        <div class="container">
            <div class="row align-items-center">

                {{-- LEFT IMAGE --}}
                <div class="col-lg-6 mb-4 mb-lg-0" >
                    <img src="{{ url('assets/header-images/get-started-pic.png') }}"
                        alt="{{ $about_intro->title ?? 'About Image' }}" class="img-fluid about-image">
                </div>

                {{-- RIGHT TEXT --}}
                <div class="col-lg-6">

                    {{-- Dynamic Title --}}
                    <h2 class="display-6 fw-bold mb-4 text-primary">
                        {{ $about_intro->title ?? 'About Fiberworld Communication Pvt. Ltd.' }}
                    </h2>

                    {{-- Dynamic Paragraphs --}}
                    @if($about_intro && $about_intro->paragraphs->count())
                        @foreach($about_intro->paragraphs as $para)
                            <p class="{{ $loop->first ? 'lead mb-4' : 'mb-3' }}">
                                {{ $para->paragraph }}
                            </p>
                        @endforeach
                    @else
                        <p class="text-muted">About information will be updated soon.</p>
                    @endif

                    <a href="{{ url('/contact') }}" class="btn btn-primary btn-lg mt-3">
                        Contact Our Team
                    </a>

                </div>
            </div>
        </div>
    </section>


    <!-- Mission & Vision Section -->
    <section class="mission-vision-section section-padding bg-light">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <h2 class="section-title">Our Guiding Principles</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="mission-vision-card">
                        <div class="icon"><i class="bi bi-bullseye"></i></div>
                        <h3>Our Mission</h3>
                        <p>To provide unparalleled internet services that enable individuals and businesses in Nepal to
                            thrive in the digital age, fostering innovation, education, and economic growth through reliable
                            and accessible connectivity.</p>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="mission-vision-card">
                        <div class="icon"><i class="bi bi-lightbulb"></i></div>
                        <h3>Our Vision</h3>
                        <p>To be the most trusted and preferred Internet Service Provider in Nepal, recognized for our
                            cutting-edge technology, exceptional customer support, and commitment to connecting every Nepali
                            household and enterprise.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us / Core Values Section -->
    <section class="values-section section-padding">
        <div class="container">
            <h2 class="section-title">Why Choose Fiberworld Communication Pvt. Ltd.?</h2>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    @foreach($values as $value)
                        <div class="value-item mb-4">
                            <h4><i class="{{ $value->icon }}"></i> {{ $value->title }}</h4>
                            <p>{{ $value->description }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Our Team Section (Optional - uncomment to include) -->
    <!-- <section class="team-section section-padding bg-light">
                                    <div class="container">
                                        <h2 class="section-title">Meet Our Team</h2>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-6 mb-4">
                                                <div class="team-member-card">
                                                    <img src="https://via.placeholder.com/150/007bff/ffffff?text=Team+Member" alt="Team Member 1">
                                                    <h4>John Doe</h4>
                                                    <p class="text-muted">CEO & Founder</p>
                                                    <div class="social-icons">
                                                        <a href="#"><i class="bi bi-linkedin"></i></a>
                                                        <a href="#"><i class="bi bi-twitter"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 mb-4">
                                                <div class="team-member-card">
                                                    <img src="https://via.placeholder.com/150/007bff/ffffff?text=Team+Member" alt="Team Member 2">
                                                    <h4>Jane Smith</h4>
                                                    <p class="text-muted">Chief Technology Officer</p>
                                                    <div class="social-icons">
                                                        <a href="#"><i class="bi bi-linkedin"></i></a>
                                                        <a href="#"><i class="bi bi-twitter"></i></a>
                                                    </div>
                                                </div>
                                            </div>  
                                            <div class="col-lg-3 col-md-6 mb-4">
                                                <div class="team-member-card">
                                                    <img src="https://via.placeholder.com/150/007bff/ffffff?text=Team+Member" alt="Team Member 3">
                                                    <h4>Peter Jones</h4>
                                                    <p class="text-muted">Head of Operations</p>
                                                    <div class="social-icons">
                                                        <a href="#"><i class="bi bi-linkedin"></i></a>
                                                        <a href="#"><i class="bi bi-twitter"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6 mb-4">
                                                <div class="team-member-card">
                                                    <img src="https://via.placeholder.com/150/007bff/ffffff?text=Team+Member" alt="Team Member 4">
                                                    <h4>Emily White</h4>
                                                    <p class="text-muted">Customer Service Lead</p>
                                                    <div class="social-icons">
                                                        <a href="#"><i class="bi bi-linkedin"></i></a>
                                                        <a href="#"><i class="bi bi-twitter"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section> -->

    <!-- Call to Action / Contact Section - Reusing style from index.html -->

    <section class="cta-section bg-primary text-white text-center section-padding">
        <div class="container">
            <h2 class="display-5 fw-bold mb-4">Have Questions? We're Here to Help!</h2>
            <p class="lead mb-5">Reach out to our friendly team for any inquiries or support.</p>
            <a href="#" class="btn btn-light btn-lg me-3"><i class="bi bi-telephone-fill me-2"></i> Call Us Now</a>
            <a href="{{ url('/contact') }}#contactForm" class="btn btn-outline-light btn-lg"><i
                    class="bi bi-envelope-fill me-2"></i> Email Us</a>
        </div>
    </section>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
@endsection