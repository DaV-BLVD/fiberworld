@extends('frontend.layouts.main')

@section('main-container')
    <link rel="stylesheet" href="{{ url('frontend\contact.css') }}">

    <!-- Page Hero Section -->
    <section class="page-hero-section"  style="background: url('assets/header-images/4.png');">
        <div class="container">
            <h1 class="display-4 contact-hero-btn">Get In Touch With Fiberworld Communication Pvt. Ltd.</h1>
            <p class="lead">Have questions, feedback, or need support? We're here to help!</p>
        </div>
    </section>

    <!-- Contact Content Section -->
    <section class="contact-content-section section-padding" id='contactForm'>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="section-title">Send Us A Message</h2>
                    <div class="contact-form-card">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="fullName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="fullName" name="full_name"
                                    placeholder="Enter your full name" required value="{{ old('full_name') }}">
                                @error('full_name') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="emailAddress" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="emailAddress" name="email"
                                    placeholder="name@example.com" required value="{{ old('email') }}">
                                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phoneNumber" class="form-label">Phone Number (Optional)</label>
                                <input type="tel" class="form-control" id="phoneNumber" name="phone"
                                    placeholder="+977-XXXXXXXXXX" value="{{ old('phone') }}">
                                @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject"
                                    placeholder="e.g., Service Inquiry, Technical Support" value="{{ old('subject') }}">
                                @error('subject') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="mb-4">
                                <label for="message" class="form-label">Your Message</label>
                                <textarea class="form-control" id="message" name="message" rows="5"
                                    placeholder="Type your message here..." required>{{ old('message') }}</textarea>
                                @error('message') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg w-100">Send Message</button>
                        </form>

                    </div>
                </div>
            </div>

            <h2 class="section-title mt-5">Or Reach Us Directly</h2>
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="contact-info-card">
                        <div class="icon"><i class="bi bi-geo-alt-fill"></i></div>
                        <h4>Our Main Office</h4>
                        <p>Kathmandu, Nepal</p>
                        <p>Bagmati Province</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-info-card">
                        <div class="icon"><i class="bi bi-telephone-fill"></i></div>
                        <h4>Call Us</h4>
                        <p>Sales: <a href="tel:+977-1234567890">+977-1234567890</a></p>
                        <p>Support: <a href="tel:+977-9876543210">+977-9876543210</a></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-info-card">
                        <div class="icon"><i class="bi bi-envelope-fill"></i></div>
                        <h4>Email Us</h4>
                        <p>General Inquiries: <a href="mailto:info@digitechnepal.com">info@digitechnepal.com</a></p>
                        <p>Support: <a href="mailto:support@digitechnepal.com">support@digitechnepal.com</a></p>
                    </div>
                </div>
            </div>

            <h2 class="section-title mt-5">Find Us on the Map</h2>
            <div class="map-embed">
                <!-- Replace with your actual Google Maps embed iframe -->
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.55938814769!2d85.31846431508215!3d27.70068898279477!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19a16499885b%3A0x6b4412c1c629f635!2sKathmandu%2C%20Nepal!5e0!3m2!1sen!2snp!4v1703600000000!5m2!1sen!2snp"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </div>
    </section>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
@endsection