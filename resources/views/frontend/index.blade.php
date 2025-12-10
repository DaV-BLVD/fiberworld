@extends('frontend.layouts.main')

@section('main-container')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiberworld Communication Pvt. Ltd. - Fast & Reliable Internet</title>
    <link rel="shortcut icon" href="{{ asset('assets/logo.jpg') }}" type="image/x-icon">

    <!-- Google Fonts - Poppins (for headings) and Open Sans (for body) -->
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <link rel="stylesheet" href="{{ url('frontend\index.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/heroSlider.css') }}">


    <body>

        <!-- Hero Slider Section -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">

                @forelse($slides as $slide)
                    <div class="swiper-slide" style="background-image: url('{{ asset('storage/' . $slide->image) }}');">
                        <div class="hero-slide-content">
                            <h1>{{ $slide->title }}</h1>
                            <p>{{ $slide->description }}</p>

                            <div class="hero-buttons">
                                @if($slide->button_text && $slide->button_link)
                                    <a href="{{ $slide->button_link }}" class="hero-btn-{{ $slide->button_type }}">
                                        {{ $slide->button_text }}
                                    </a>
                                @endif

                                @if($slide->button_text2 && $slide->button_link2)
                                    <a href="{{ $slide->button_link2 }}" class="hero2-btn-{{ $slide->button_type2 }}">
                                        {{ $slide->button_text2 }}
                                    </a>
                                @endif
                            </div>
                        </div>

                    </div>
                @empty
                    <div class="swiper-slide"
                        style="background-color: #333; display:flex; align-items:center; justify-content:center; color:white;">
                        <h2>No slides available</h2>
                    </div>
                @endforelse

            </div>

            <!-- Pagination -->
            <div class="swiper-pagination"></div>

            <!-- Navigation buttons -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
        <script>
            const swiper = new Swiper('.mySwiper', {
                loop: true,
                slidesPerView: 1,
                spaceBetween: 0,
                speed: 1000,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        </script>


        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
        <script>
            const swiper = new Swiper('.mySwiper', {
                loop: true,
                slidesPerView: 1,
                spaceBetween: 0,
                speed: 1000,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        </script>

        <!-- Services Section -->
        <section class="services-section section-padding bg-light">
            <div class="container">
                <h2 class="section-title">Our Internet Services</h2>
                <div class="row">
                    @foreach ($Services_name as $service)
                        @if($service->slug !== 'custom-service') <!-- Exclude custom-service -->
                            <div class="col-md-4">
                                <div class="service-card">
                                    <div class="icon">
                                        <i class="{{ $service->icon_class ?? 'bi bi-info-circle' }}"></i>
                                    </div>
                                    <h3>{{ $service->name }}</h3>
                                    <p>{{ $service->hero_subtitle }}</p>
                                    <a href="{{ url($service->slug) }}" class="btn btn-outline-primary mt-3">Learn More</a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>




        {{-- select plan buttons for backend --}}
        <section class="pricing-section section-padding" id="pricing">
            <div class="container">
                <h2 class="section-title mb-3">Choose Your Perfect Plan</h2>
                <p class="text-center lead mb-5">
                    Flexible plans to suit every need and budget. Find your ideal speed below!
                </p>

                <div class="row justify-content-center">
                    {{-- Render regular services first (exclude custom-service) --}}
                    @foreach ($services as $service)
                        @if($service->slug !== 'custom-service')
                            @foreach ($service->plans as $plan)
                                <div class="col-lg-3 col-md-6 mb-4">
                                    <div class="price-card {{ $plan->is_recommended ? 'recommended' : '' }}">
                                        <div>
                                            @if($plan->is_recommended)
                                                <span class="badge bg-primary mb-3 py-2 px-3 rounded-pill">Recommended</span>
                                            @endif

                                            <h4>{{ $plan->name }}</h4>
                                            <div class="speed">
                                                @if($plan->speed_mbps)
                                                    {{ $plan->speed_mbps }} <small>{{ $plan->speed_unit }}</small>
                                                @else
                                                    You Decide!
                                                @endif
                                            </div>
                                            <div class="price">
                                                NPR {{ number_format($plan->price, 0) }}<small>/{{ $plan->billing_period }}</small>
                                            </div>

                                            <ul>
                                                @foreach ($plan->features as $feature)
                                                    @if($feature->is_available)
                                                        <li><i class="bi bi-check-circle-fill"></i> {{ $feature->feature_text }}</li>
                                                    @else
                                                        <li><i class="bi bi-x-circle-fill text-danger"></i> {{ $feature->feature_text }}</li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>

                                        <a href="#" class="btn-primary btn-md" style="text-decoration: none; color: white">Select
                                            Plan</a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Render Custom Service dynamically --}}
                    @php
                        $customService = $customPlanService->firstWhere('slug', 'custom-service');
                    @endphp

                    @if($customService)
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="price-card text-center">

                                <div>

                                    <h4>{{ $customService->hero_heading }}</h4>

                                    <div class="speed">You Decide!</div>

                                    <div class="price">
                                        Custom Pricing
                                    </div>

                                    <ul>
                                        <li>
                                            <i class="{{ $customService->icon_class }}"></i>
                                            Tailored Speed
                                        </li>
                                        <li>
                                            <i class="{{ $customService->icon_class }}"></i>
                                            Dedicated Support
                                        </li>
                                        <li>
                                            <i class="{{ $customService->icon_class }}"></i>
                                            Optional Router
                                        </li>
                                    </ul>
                                </div>

                                <a href="#customPlanBuilder" class="btn-primary btn-md"
                                    style="text-decoration:none; color:white;">
                                    Build Plan
                                </a>
                            </div>
                        </div>
                    @endif

                </div>

                <p class="text-center mt-1 text-muted">
                    Prices are inclusive of all taxes. Fair Usage Policy applies. Terms and conditions apply.
                </p>
            </div>
        </section>




        {{-- Request custom plan for backend --}}

        <!-- Custom Plan Builder Section -->
        {{-- <section class="custom-plan-section section-padding" id="customPlanBuilder">
            <div class="container">
                <h2 class="section-title mb-4">Build Your Own Custom Plan</h2>
                <p class="text-center lead mb-2">Adjust the sliders to get the perfect internet speed and data for your
                    needs.</p>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="custom-plan-card">
                            <h3>Your Personalized Internet Plan</h3>

                            <div class="mb-1">
                                <label for="speedRange" class="form-label">Select Your Speed:</label>
                                <input type="range" min="{{ $customPlan->speed_min }}" max="{{ $customPlan->speed_max }}"
                                    step="{{ $customPlan->speed_step }}" value="{{ $customPlan->speed_min }}"
                                    id="speedRange">
                                <div class="range-output"><span id="speedValue">50</span> Mbps</div>
                            </div>

                            <div class="mb-2">
                                <label for="dataRange" class="form-label">Select Your Data Limit:</label>
                                <input type="range" min="{{ $customPlan->data_min }}" max="{{ $customPlan->data_max }}"
                                    step="{{ $customPlan->data_step }}" value="{{ $customPlan->data_min }}" id="dataRange">
                                <div class="range-output">
                                    <span id="dataValue">500</span> GB
                                    <small class="text-muted ms-2">(Unlimited option available below)</small>
                                </div>
                                <div class="form-check form-switch mt-3">
                                    <input class="form-check-input" type="checkbox" id="unlimitedDataSwitch">
                                    <label class="form-check-label" for="unlimitedDataSwitch">Unlimited Data</label>
                                </div>
                            </div>

                            <hr class="my-1">

                            <h4 class="total-price">Estimated Monthly Cost: NPR <span
                                    id="calculatedPrice">1500</span><small>/month</small></h4>
                            <button class="btn btn-primary btn-md mt-3">Request Custom Plan</button>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <section class="custom-plan-section section-padding" id="customPlanBuilder">
            <div class="container">
                <h2 class="section-title mb-4">Build Your Own Custom Plan</h2>
                <p class="text-center lead mb-2">Adjust the sliders to get the perfect internet speed and data for your
                    needs.</p>

                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="custom-plan-card">
                            <h3>Your Personalized Internet Plan</h3>

                            {{-- Speed Slider --}}
                            <div class="mb-4">
                                <label for="speedRange" class="form-label fw-bold">Select Your Speed</label>
                                <div class="d-flex align-items-center">
                                    <input type="range" min="{{ $customPlan->speed_min }}"
                                        max="{{ $customPlan->speed_max }}" step="{{ $customPlan->speed_step }}"
                                        value="{{ $customPlan->speed_min }}" id="speedRange"
                                        class="form-range flex-grow-1 me-3">
                                    <span class="badge bg-success px-3 py-2" id="speedValue">{{ $customPlan->speed_min }}
                                        Mbps</span>
                                </div>
                            </div>

                            {{-- Data Slider --}}
                            <div class="mb-4">
                                <label for="dataRange" class="form-label fw-bold">Select Your Data Limit</label>
                                <div class="d-flex align-items-center justify-content-between">
                                    <input type="range" min="{{ $customPlan->data_min }}" max="{{ $customPlan->data_max }}"
                                        step="{{ $customPlan->data_step }}" value="{{ $customPlan->data_min }}"
                                        id="dataRange" class="form-range flex-grow-1 me-3">
                                    <span class="badge bg-primary px-3 py-2" id="dataValue">{{ $customPlan->data_min }}
                                        GB</span>
                                    <div class="form-check form-switch ms-4">
                                        <input class="form-check-input" type="checkbox" id="unlimitedDataSwitch">
                                        <label class="form-check-label fw-semibold"
                                            for="unlimitedDataSwitch">Unlimited</label>
                                    </div>
                                </div>
                                <small class="text-muted d-block mt-1">(Unlimited option available)</small>
                            </div>

                            <style>
                                /* Slider styling */
                                input[type=range].form-range {
                                    height: 8px;
                                    border-radius: 5px;
                                    background: linear-gradient(to right, #0d6efd 0%, #0d6efd 50%, #e9ecef 50%, #e9ecef 100%);
                                    transition: background 0.3s;
                                }

                                input[type=range].form-range::-webkit-slider-thumb {
                                    -webkit-appearance: none;
                                    width: 24px;
                                    height: 24px;
                                    background: #0d6efd;
                                    border-radius: 50%;
                                    border: 2px solid #fff;
                                    cursor: pointer;
                                    transition: transform 0.2s;
                                }

                                input[type=range].form-range::-webkit-slider-thumb:hover {
                                    transform: scale(1.2);
                                }

                                input[type=range].form-range::-moz-range-thumb {
                                    width: 24px;
                                    height: 24px;
                                    background: #0d6efd;
                                    border-radius: 50%;
                                    border: 2px solid #fff;
                                    cursor: pointer;
                                }
                            </style>



                            <hr class="my-1">

                            {{-- Price --}}
                            <h4 class="total-price">Estimated Monthly Cost: NPR <span
                                    id="calculatedPrice"></span><small>/month</small></h4>

                            {{-- Email/Phone Inputs --}}
                            <div class="mb-2 mt-3">

                                <!-- Full Name -->
                                <input type="text" class="form-control mb-2" id="userFullName"
                                    placeholder="Enter your full name (Required)" required>

                                <!-- Phone -->
                                <input type="tel" class="form-control mb-2" id="userPhone"
                                    placeholder="Enter your phone (Required)" required pattern="[0-9]{10,15}"
                                    title="Enter a valid phone number (10-15 digits)">

                                <!-- Email -->
                                <input type="email" class="form-control mb-2" id="userEmail"
                                    placeholder="Enter your email (Optional but Recommended)">
                            </div>



                            <button class="btn-primary btn-md mt-3" style="color: white" id="submitCustomPlan">Request
                                Custom Plan</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Modal --}}
            <div class="modal fade" id="planSummaryModal" tabindex="-1" aria-labelledby="planSummaryModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Confirm Your Custom Plan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Full Name:</strong> <span id="modalFullName"></span></p>
                            <p><strong>Speed:</strong> <span id="modalSpeed"></span> Mbps</p>
                            <p><strong>Data Limit:</strong> <span id="modalData"></span></p>
                            <p><strong>Estimated Price:</strong> NPR <span id="modalPrice"></span></p>
                            <p><strong>Email:</strong> <span id="modalEmail"></span></p>
                            <p><strong>Phone:</strong> <span id="modalPhone"></span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Edit</button>
                            <button type="button" class="btn btn-primary" id="confirmPlanBtn">Confirm & Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script>
            document.addEventListener('DOMContentLoaded', () => {

                const userFullName = document.getElementById('userFullName');
                const speedRange = document.getElementById('speedRange');
                const dataRange = document.getElementById('dataRange');
                const unlimitedSwitch = document.getElementById('unlimitedDataSwitch');
                const speedValue = document.getElementById('speedValue');
                const dataValue = document.getElementById('dataValue');
                const priceValue = document.getElementById('calculatedPrice');

                const userPhone = document.getElementById('userPhone');
                const userEmail = document.getElementById('userEmail');

                const submitBtn = document.getElementById('submitCustomPlan');
                const confirmBtn = document.getElementById('confirmPlanBtn');

                const modalFullName = document.getElementById('modalFullName');
                const modalSpeed = document.getElementById('modalSpeed');
                const modalData = document.getElementById('modalData');
                const modalPrice = document.getElementById('modalPrice');
                const modalEmail = document.getElementById('modalEmail');
                const modalPhone = document.getElementById('modalPhone');

                const speedPerMbps = {{ $customPlan->price_per_mbps }};
                const dataPerGB = {{ $customPlan->price_per_gb }};
                const unlimitedDataPrice = {{ $customPlan->unlimited_data_price }};

                // Only digits for phone
                userPhone.addEventListener('input', (e) => {
                    e.target.value = e.target.value.replace(/\D/g, '');
                });

                // Email validation
                function isValidEmail(email) {
                    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
                }

                // Calculate price
                function calculatePrice() {
                    const speed = parseInt(speedRange.value);
                    const data = unlimitedSwitch.checked ? 0 : parseInt(dataRange.value);
                    const price = (speed * speedPerMbps) + (unlimitedSwitch.checked ? unlimitedDataPrice : data * dataPerGB);
                    priceValue.innerText = price.toFixed(2);
                }

                // Slider & toggle events
                speedRange.addEventListener('input', () => {
                    speedValue.innerText = speedRange.value + ' Mbps';
                    calculatePrice();
                });

                dataRange.addEventListener('input', () => {
                    dataValue.innerText = dataRange.value + ' GB';
                    calculatePrice();
                });

                unlimitedSwitch.addEventListener('change', () => {
                    dataRange.disabled = unlimitedSwitch.checked;
                    dataValue.innerText = unlimitedSwitch.checked ? 'Unlimited' : dataRange.value + ' GB';
                    calculatePrice();
                });

                calculatePrice(); // initial

                // Open modal on submit
                submitBtn.addEventListener('click', () => {
                    const phoneValue = userPhone.value.trim();
                    const emailValue = userEmail.value.trim();

                    if (!userFullName.value.trim()) {
                        alert('Full name is required.');
                        userFullName.focus();
                        return;
                    }

                    if (!phoneValue) {
                        alert('Phone number is required.');
                        userPhone.focus();
                        return;
                    }

                    if (phoneValue.length < 10 || phoneValue.length > 15) {
                        alert('Phone number must be 10-15 digits.');
                        userPhone.focus();
                        return;
                    }

                    if (emailValue && !isValidEmail(emailValue)) {
                        alert('Please enter a valid email address.');
                        userEmail.focus();
                        return;
                    }

                    // Populate modal
                    modalFullName.innerText = userFullName.value;
                    modalSpeed.innerText = speedRange.value;
                    modalData.innerText = unlimitedSwitch.checked ? 'Unlimited' : dataRange.value + ' GB';
                    modalPrice.innerText = priceValue.innerText;
                    modalEmail.innerText = emailValue || '-';
                    modalPhone.innerText = phoneValue;

                    new bootstrap.Modal(document.getElementById('planSummaryModal')).show();
                });

                // Confirm & submit via AJAX
                confirmBtn.addEventListener('click', () => {
                    const payload = {
                        full_name: userFullName.value,
                        speed: parseInt(speedRange.value),
                        data_limit: unlimitedSwitch.checked ? null : parseInt(dataRange.value),
                        unlimited_data: unlimitedSwitch.checked ? 1 : 0,
                        calculated_price: parseFloat(priceValue.innerText),
                        email: userEmail.value || null,
                        phone: userPhone.value
                    };

                    fetch("{{ route('custom_plan.store') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(payload)
                    })
                        .then(res => res.json())
                        .then(res => {
                            if (res.success) {
                                alert(res.message);
                                location.reload();
                            } else {
                                alert(res.message || 'Something went wrong!');
                            }
                        })
                        .catch(err => {
                            console.error(err);
                            alert('Request failed. Check console.');
                        });
                });

            });
        </script>





        <!-- Coverage Area Section -->
        <section class="coverage-section section-padding" id="coverage">
            <div class="container">
                <h2 class="section-title mb-2">Available in 20+ Cities And Still Growing</h2>
                <p class="text-center lead mb-2">
                    Fiberworld Communication Pvt. Ltd. is proud to provide internet to more than 350 communities across 18
                    states. With continuous improvements to our network, more homes are getting access to fiber internet,
                    our fastest and most reliable connection yet. Experience the Fiberworld difference today!
                </p>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="row g-3 justify-content-center coverage-form-group">
                            <div class="col-md-5 col-8">
                                <select class="form-select form-select-md" id="districtSelect">
                                    <option selected disabled value="">Select District</option>
                                    @foreach($districts as $district)
                                        <option value="{{ $district->slug }}">{{ $district->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-md-5 col-8">
                                <select class="form-select form-select-md" id="areaSelect" aria-label="Area selection"
                                    disabled>
                                    <option selected disabled value="">Select Area</option>
                                </select>
                            </div>
                            <div class="col-md-2 col-4">
                                <button class="btn-primary btn-md w-100" style="color: white;" type="button"
                                    id="checkCoverageBtn">Check</button>
                            </div>
                        </div>

                        <div id="coverageResult" class="coverage-result text-primary mt-4">
                            <!-- Coverage result will be displayed here -->
                        </div>

                        <div id="map" style="height: 400px; margin-top: 20px;"></div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Testimonials Section -->
        <section class="testimonials-section section-padding">
            <div class="container">
                <h2 class="section-title">What Our Customers Say</h2>

                <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">

                    {{-- Carousel Indicators --}}
                    <div class="carousel-indicators mb-4">
                        @foreach($testimonials as $index => $testimonial)
                            <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="{{ $index }}"
                                class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}"
                                aria-label="Slide {{ $index + 1 }}"></button>
                        @endforeach
                    </div>

                    {{-- Carousel Inner --}}
                    <div class="carousel-inner">
                        @foreach($testimonials as $index => $testimonial)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 mb-4">
                                        <div class="testimonial-card">
                                            <blockquote>
                                                "{{ $testimonial->testimony }}"
                                            </blockquote>
                                            <p class="customer-name">- {{ $testimonial->name }}</p>
                                            <p class="customer-info">{{ $testimonial->status }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Carousel Controls --}}
                    <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>

                </div>
            </div>
        </section>


        <!-- Call to Action / Contact Section -->
        <section class="cta-section bg-primary text-white text-center section-padding">
            <div class="container">
                <h2 class="display-5 fw-bold mb-4">Ready to Get Connected?</h2>
                <p class="lead mb-5">Contact us today to find the best internet solution for your home or business.</p>
                <a href="#" class="btn btn-light btn-lg me-3"><i class="bi bi-telephone-fill me-2"></i> Call Us
                    Now</a>
                <a href="{{ url('/contact') }}" class="btn btn-outline-light btn-lg"><i
                        class="bi bi-envelope-fill me-2"></i> Email
                    Us</a>
            </div>
        </section>

        <!-- Bootstrap JS Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
            </script>

        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

        <script>
            // Initialize map
            const map = L.map('map').setView([28.3949, 84.1240], 7); // Center of Nepal

            // Add tile layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            // District and area coordinates
            const locations = @json(
                $districts->mapWithKeys(function ($district) {
                    return [
                        $district->slug => $district->areas->mapWithKeys(function ($area) {
                            return [
                                $area->area_name => [
                                    floatval($area->latitude),
                                    floatval($area->longitude)
                                ]
                            ];
                        })
                    ];
                })
            );

            const districtSelect = document.getElementById('districtSelect');
            const areaSelect = document.getElementById('areaSelect');
            const coverageResult = document.getElementById('coverageResult');

            let marker, circle;

            // Enable and populate areas based on selected district
            districtSelect.addEventListener('change', function () {
                const district = this.value;
                areaSelect.innerHTML = '<option selected disabled value="">Select Area</option>';
                areaSelect.disabled = true;

                if (district && locations[district]) {
                    for (let area in locations[district]) {
                        const option = document.createElement('option');
                        option.value = area;
                        option.textContent = area;
                        areaSelect.appendChild(option);
                    }
                    areaSelect.disabled = false;

                    // Optional: Zoom to first area
                    const firstArea = Object.values(locations[district])[0];
                    map.setView(firstArea, 10);
                }
            });

            // Check coverage button click
            document.getElementById('checkCoverageBtn').addEventListener('click', function () {
                const district = districtSelect.value;
                const area = areaSelect.value;

                if (!district || !area) {
                    coverageResult.textContent = "Please select both district and area.";
                    return;
                }

                // Remove previous marker/circle
                if (marker) map.removeLayer(marker);
                if (circle) map.removeLayer(circle);

                const [lat, lon] = locations[district][area];

                marker = L.marker([lat, lon]).addTo(map).bindPopup(`${area}, ${district}`).openPopup();

                circle = L.circle([lat, lon], {
                    color: 'blue',
                    fillColor: '#30f',
                    fillOpacity: 0.3,
                    radius: 3000 // 3km coverage radius
                }).addTo(map);

                map.setView([lat, lon], 12);

                coverageResult.textContent = `Fiber World internet is available in ${area}, ${district}!`;
            });

            // Custom Plan Logic
            const speedRange = document.getElementById('speedRange');
            const speedValue = document.getElementById('speedValue');
            const dataRange = document.getElementById('dataRange');
            const dataValue = document.getElementById('dataValue');
            const unlimitedDataSwitch = document.getElementById('unlimitedDataSwitch');
            const calculatedPrice = document.getElementById('calculatedPrice');
            const customPlanPriceDisplay = document.getElementById('customPlanPriceDisplay'); // For the card

            // Base pricing coefficients (adjust these as needed for your pricing model)
            const BASE_PRICE = 1000; // Base cost for any custom plan
            const PRICE_PER_MBPS = 8; // Cost per Mbps
            const PRICE_PER_GB = 1; // Cost per GB (for limited data)
            const UNLIMITED_DATA_PREMIUM = 500; // Extra cost for unlimited data

            function updateCustomPlanPrice() {
                let speed = parseInt(speedRange.value);
                let data = parseInt(dataRange.value);
                let isUnlimited = unlimitedDataSwitch.checked;

                speedValue.textContent = speed;
                dataValue.textContent = isUnlimited ? "Unlimited" : data;

                let currentPrice = BASE_PRICE;
                currentPrice += (speed * PRICE_PER_MBPS);

                if (isUnlimited) {
                    currentPrice += UNLIMITED_DATA_PREMIUM;
                } else {
                    currentPrice += (data * PRICE_PER_GB);
                }

                calculatedPrice.textContent = currentPrice.toLocaleString(); // Format with commas
                customPlanPriceDisplay.textContent = currentPrice.toLocaleString();
            }

            speedRange.addEventListener('input', updateCustomPlanPrice);
            dataRange.addEventListener('input', updateCustomPlanPrice);
            unlimitedDataSwitch.addEventListener('change', function () {
                if (this.checked) {
                    dataRange.disabled = true; // Disable data slider if unlimited is selected
                } else {
                    dataRange.disabled = false;
                }
                updateCustomPlanPrice();
            });

            // Initial price calculation on load
            updateCustomPlanPrice();
        </script>
        <!-- Dynamic Pricing Script -->
        <script>
            // These values come directly from the database
            const pricePerMbps = {{ $customPlan->price_per_mbps }};
            const pricePerGB = {{ $customPlan->price_per_gb }};
            const unlimitedPrice = {{ $customPlan->unlimited_data_price }};

            const speedSlider = document.getElementById('speedRange');
            const speedValue = document.getElementById('speedValue');

            const dataSlider = document.getElementById('dataRange');
            const dataValue = document.getElementById('dataValue');

            const unlimitedSwitch = document.getElementById('unlimitedDataSwitch');
            const priceOutput = document.getElementById('calculatedPrice');

            // Update labels live
            function updateLabels() {
                speedValue.textContent = speedSlider.value;
                dataValue.textContent = dataSlider.value;
            }

            // Main price calculation
            function calculatePrice() {
                let speed = parseInt(speedSlider.value);
                let data = parseInt(dataSlider.value);
                let unlimited = unlimitedSwitch.checked;

                // Basic price formula from database
                let price = speed * pricePerMbps;

                if (unlimited) {
                    price += unlimitedPrice;
                } else {
                    price += data * pricePerGB;
                }

                priceOutput.textContent = price;
            }

            // Update on events
            speedSlider.addEventListener('input', () => {
                updateLabels();
                calculatePrice();
            });

            dataSlider.addEventListener('input', () => {
                updateLabels();
                calculatePrice();
            });

            unlimitedSwitch.addEventListener('change', calculatePrice);

            // Initial load
            updateLabels();
            calculatePrice();
        </script>


    </body>
@endsection