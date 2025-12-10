@extends('frontend.layouts.main')

@section('main-container')
    <link rel="stylesheet" href="{{ url('frontend\dedicated_leased_line.css') }}">

    <!-- Dedicated Leased Line Hero Section -->
    <section class="leased-line-hero"  style="background: url('assets/header-images/7.1.png')">
        <div class="container">
            <h1 class="display-3">Unrivaled Connectivity: Dedicated Leased Line</h1>
            <p class="lead">Experience unmatched reliability, speed, and security for your critical business
                operations. A private circuit, exclusively for your enterprise.</p>
            <a href="{{ url('/contact') }}#contactForm" class="dedicatedleasedline_btn">Get a Custom Quote</a>
            <a href="#" class="dedicatedleasedline_btn2">View Technical Specs</a>
        </div>
    </section>

    <!-- Key Advantages Section -->
    <section class="section-padding bg-light">
        <div class="container">
            <h2 class="section-title">Why Fiberworld Communication Pvt. Ltd. for Your Home?</h2>

            <div class="row text-center">
                @foreach ($items as $item)
                    <div class="col-md-4 mb-4">
                        <div class="feature-box p-3 h-100">
                            <div class="icon mb-2">
                                @if($item->icon)
                                    @if(Str::startsWith($item->icon, 'bi '))
                                        {{-- Bootstrap Icon --}}
                                        <i class="{{ $item->icon }}" style="font-size:50px;"></i>
                                    @else
                                        {{-- Image --}}
                                        <img src="{{ asset('storage/' . $item->icon) }}" alt="{{ $item->title }}"
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


    <!-- How the Process Works -->
    <section class="section-padding bg-light">
        <div class="container">
            <h2 class="section-title">Simple Steps to Enterprise Connectivity</h2>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 process-step">
                    <div class="step-number">1</div>
                    <h3>Consultation</h3>
                    <p>Discuss your specific network requirements with our enterprise solutions team to determine
                        optimal bandwidth.</p>
                </div>
                <div class="col-lg-3 col-md-6 process-step">
                    <div class="step-number">2</div>
                    <h3>Custom Proposal</h3>
                    <p>Receive a tailor-made proposal outlining speeds, transparent pricing, and comprehensive SLA
                        details.</p>
                </div>
                <div class="col-lg-3 col-md-6 process-step">
                    <div class="step-number">3</div>
                    <h3>Installation & Activation</h3>
                    <p>Our expert engineers will ensure seamless deployment and activation of your dedicated line with
                        minimal downtime.</p>
                </div>
                <div class="col-lg-3 col-md-6 process-step">
                    <div class="step-number">4</div>
                    <h3>24/7 Monitoring & Support</h3>
                    <p>Benefit from continuous network monitoring and proactive support to ensure maximum uptime and
                        performance.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Ideal For Section -->
    <section class="section-padding">
        <div class="container">
            <h2 class="section-title">Who Benefits from a Dedicated Leased Line?</h2>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="ideal-for-item">
                        <div class="icon"><i class="bi bi-bank"></i></div>
                        <div>
                            <h4>Financial Institutions</h4>
                            <p>For secure, low-latency transactions, critical data exchange, and compliance
                                requirements.</p>
                        </div>
                    </div>
                    <div class="ideal-for-item">
                        <div class="icon"><i class="bi bi-cloud-haze-fill"></i></div>
                        <div>
                            <h4>Data Centers & Hosting Providers</h4>
                            <p>Demanding consistent, high-capacity bandwidth for their infrastructure and client
                                services.</p>
                        </div>
                    </div>
                    <div class="ideal-for-item">
                        <div class="icon"><i class="bi bi-building-fill"></i></div>
                        <div>
                            <h4>Large Corporations & MNCs</h4>
                            <p>Connecting multiple offices, requiring robust international links, or supporting vast
                                internal networks.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ideal-for-item">
                        <div class="icon"><i class="bi bi-broadcast"></i></div>
                        <div>
                            <h4>ISPs & Telecom Providers</h4>
                            <p>For backbone connectivity, wholesale internet services, and reliable inter-network links.
                            </p>
                        </div>
                    </div>
                    <div class="ideal-for-item">
                        <div class="icon"><i class="bi bi-play-btn-fill"></i></div>
                        <div>
                            <h4>Media & Entertainment</h4>
                            <p>High-bandwidth needs for content creation, live streaming, distribution, and large file
                                transfers.</p>
                        </div>
                    </div>
                    <div class="ideal-for-item">
                        <div class="icon"><i class="bi bi-hospital-fill"></i></div>
                        <div>
                            <h4>Healthcare & Education</h4>
                            <p>Secure and reliable networks for sensitive patient data, large-scale e-learning
                                platforms, and research.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Industry Logos (Optional, if you have partners/clients) -->
    <section class="section-padding bg-light industry-logo-grid">
        <div class="container text-center">
            <h2 class="section-title">Trusted by Leading Enterprises & Industries</h2>
            <p class="lead mb-5">Our dedicated leased lines power critical operations across various sectors in Nepal
                and beyond.</p>
            <div class="row align-items-center justify-content-center">
                <div class="col-md-2 col-4 mb-4"><img src="https://via.placeholder.com/150x70?text=Bank+A+Logo"
                        alt="Bank A Logo" class="img-fluid"></div>
                <div class="col-md-2 col-4 mb-4"><img src="https://via.placeholder.com/150x70?text=Hospital+X+Logo"
                        alt="Hospital X Logo" class="img-fluid"></div>
                <div class="col-md-2 col-4 mb-4"><img src="https://via.placeholder.com/150x70?text=IT+Firm+B+Logo"
                        alt="IT Firm B Logo" class="img-fluid"></div>
                <div class="col-md-2 col-4 mb-4"><img src="https://via.placeholder.com/150x70?text=Govt+Agency+Y+Logo"
                        alt="Government Agency Y Logo" class="img-fluid"></div>
                <div class="col-md-2 col-4 mb-4"><img src="https://via.placeholder.com/150x70?text=Media+House+Z+Logo"
                        alt="Media House Z Logo" class="img-fluid"></div>
                <div class="col-md-2 col-4 mb-4"><img src="https://via.placeholder.com/150x70?text=Telecom+P+Logo"
                        alt="Telecom P Logo" class="img-fluid"></div>
            </div>
        </div>
    </section>

    <!-- Call to Action / Contact Section -->
    <section id="contact" class="cta-section bg-primary text-white text-center section-padding">
        <div class="container">
            <h2 class="display-5 fw-bold mb-4">Ready for Unrivaled Business Internet?</h2>
            <p class="lead mb-5">Contact our Enterprise Team today to discuss your dedicated connectivity needs and
                receive a tailored solution.</p>
            <a href="get-started.html" class="btn btn-light btn-lg me-3"><i class="bi bi-telephone-fill me-2"></i>
                Call Enterprise Sales</a>
            <a href="{{ url('/contact') }}#contactForm" class="btn btn-outline-light btn-lg"><i
                    class="bi bi-envelope-fill me-2"></i> Request a Quote</a>
        </div>
    </section>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
@endsection