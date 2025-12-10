<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="{{ asset('assets/logo-icon.svg') }}" type="image/x-icon">

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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <link rel="stylesheet" href="{{ url('frontend\navbar.css') }}">

    <link rel="stylesheet" href="{{ url('frontend\HeroSliderStyle.css') }}">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />



</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm py-0">
        <div class="container">
            <a class="navbar-brand {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                <img src="{{ asset('assets/logo.jpg') }}" alt="" style="height: 80px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 font-bold">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page"
                            href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarServicesDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Services
                        </a>
                        <ul class="dropdown-menu border-0 shadow-sm" aria-labelledby="navbarServicesDropdown">
                            <li><a class="dropdown-item {{ request()->is('home-internet') ? 'active' : '' }}"
                                    href="{{ url('/home-internet') }}">Home Internet</a></li>
                            <li><a class="dropdown-item {{ request()->is('business-internet') ? 'active' : '' }}"
                                    href="{{ url('/business-internet') }}">Business Internet</a>
                            </li>
                            <li><a class="dropdown-item {{ request()->is('dedicated-leased-line') ? 'active' : '' }}"
                                    href="{{ url('/dedicated-leased-line') }}">Dedicated Leased
                                    Line</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('plans') ? 'active' : '' }}"
                            href="{{ url('/plans') }}">Plans
                            & Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('coverage') ? 'active' : '' }}"
                            href="{{ url('/coverage') }}">Coverage Area</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarSupportDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Support
                        </a>
                        <ul class="dropdown-menu border-0 shadow-sm" aria-labelledby="navbarSupportDropdown">
                            <li><a class="dropdown-item {{ request()->is('faq') ? 'active' : '' }}"
                                    href="{{ url('/faq') }}">FAQ</a></li>
                            <li><a class="dropdown-item {{ request()->is('contact') ? 'active' : '' }}"
                                    href="{{ url('/contact') }}">Contact Us</a></li>
                            <li><a class="dropdown-item {{ request()->is('report_issue') ? 'active' : '' }}"
                                    href="{{ url('/report_issue') }}">Report an Issue</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('about') ? 'active' : '' }}"
                            href="{{ url('/about') }}">About
                            Us</a>
                    </li>
                </ul>
                <a href="{{ url('/get_started') }}"
                    class="btn-primary ms-lg-3 {{ request()->is('get_started') ? 'active' : '' }}" style="text-decoration: none; color:white;">Get Started</a>
            </div>
        </div>
    </nav>



</body>

</html>