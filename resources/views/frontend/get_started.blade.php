@extends('frontend.layouts.main')

@section('main-container')
    <link rel="stylesheet" href="{{ url('frontend\get_started.css') }}">

    <!-- Page Hero Section -->
    <section class="page-hero" style="background: url('assets/header-images/kalshfqwere.png')">
        <div class="container">
            <h1 class="display-4">Ready to Get Connected?</h1>
            <p class="lead">Let's find the perfect internet solution for you!</p>
        </div>
    </section>

    <!-- Steps to Get Started Section -->
    <section class="get-started-steps section-padding bg-light">
        <div class="container">
            <h2 class="section-title">It's Easy to Start with Fiberworld Communication Pvt. Ltd.</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="step-card">
                        <div class="icon"><i class="bi bi-geo-alt-fill"></i></div>
                        <h3>1. Check Coverage</h3>
                        <p>Verify if our high-speed internet is available in your area. Enter your address for instant
                            confirmation.</p>
                        <a href="{{ url('/') }}#coverage" class="btn btn-outline-primary mt-3">Check Now</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="step-card">
                        <div class="icon"><i class="bi bi-card-checklist"></i></div>
                        <h3>2. Choose Your Plan</h3>
                        <p>Browse our flexible home and business plans to find the one that best fits your speed and budget.
                        </p>
                        <a href="{{ url('/plans') }}#homeInternet" class="btn btn-outline-primary mt-3">View Plans</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="step-card">
                        <div class="icon"><i class="bi bi-calendar-check-fill"></i></div>
                        <h3>3. Schedule Installation</h3>
                        <p>Once you've chosen a plan, our team will contact you to arrange a convenient installation
                            appointment.</p>
                        <a href="#contactForm" class="btn btn-primary mt-3">Request Call Back</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="contact-section section-padding" id='contactForm'>
        <div class="container">

            <h2 class="section-title">Still Have Questions? Contact Us!</h2>
            <div class="contact-form-section">
                {{-- Show success message --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <p class="text-center lead mb-4">Fill out the form below, and one of our friendly representatives will get
                    back to you shortly.</p>
                <form id="contactForm" action="{{ route('inquiry.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="fullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control form-control-lg" id="fullName" name="full_name"
                                placeholder="Enter your full name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="emailAddress" class="form-label">Email Address</label>
                            <input type="email" class="form-control form-control-lg" id="emailAddress" name="email_address"
                                placeholder="name@example.com" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="phoneNumber" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control form-control-lg" id="phoneNumber" name="phone_number"
                                placeholder="+977-XXXXXXXXXX">
                        </div>
                        <div class="col-md-6">
                            <label for="serviceType" class="form-label">Interested Service</label>
                            <select class="form-select form-select-lg" id="serviceType" name="service_type">
                                <option selected disabled>Choose...</option>
                                <option value="home">Home Internet</option>
                                <option value="business">Business Internet</option>
                                <option value="leased_line">Dedicated Leased Line</option>
                                <option value="general">General Inquiry</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="message" class="form-label">Your Message</label>
                        <textarea class="form-control form-control-lg" id="message" name="message" rows="5"
                            placeholder="Tell us about your needs or questions..."></textarea>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg"><i class="bi bi-send-fill me-2"></i> Submit
                            Inquiry</button>
                    </div>
                </form>

            </div>
        </div>
    </section>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
@endsection