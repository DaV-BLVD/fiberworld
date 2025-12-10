<style>
    .app-sidebar a,
    .app-sidebar a:hover,
    .app-sidebar a:focus,
    .app-sidebar a:active {
        text-decoration: none !important;
    }

    .side-menu__item {
        display: flex;
        align-items: center;
        padding: 12px 20px;
        color: #333;
        text-decoration: none;
        font-weight: 600;
        /* Bolder font */
        transition: background 0.2s;
    }

    .slide-menu .slide-item {
        display: block;
        padding: 8px 0;
        color: #555;
        text-decoration: none;
        font-weight: 500;
        text-align: center;
    }

    .slide.open>.slide-menu {
        display: block;
    }

    .side-menu__item.active {
        background-color: #e0e7ff;
        /* light highlight */
        font-weight: 700;
        /* extra bold */
        color: #1d4ed8;
        /* primary color */
    }

</style>

<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="sidebar-img">
        <a class="navbar-brand" href="{{ route('admin.dashboard_summary.index') }}">
            <img alt="..." class="navbar-brand-img main-logo" src="{{ asset('admin/img/brand/logoo.jpg') }}">
            {{-- <img alt="..." class="navbar-brand-img logo" src="{{ asset('admin/img/brand/logo.png') }}"> --}}
        </a>
        <ul class="side-menu">
            <li>
                <a class="side-menu__item {{ request()->routeIs('admin.dashboard_summary.index') ? 'active' : '' }}"
                    href="{{ route('admin.dashboard_summary.index') }}">
                    <i class="side-menu__icon fe fe-home"></i>
                    <span class="side-menu__label">Admin Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.header_slider.index') }}" class="side-menu__item {{ request()->routeIs('admin.header_slider.index') ? 'active' : '' }}">
                    <i class="side-menu__icon fe fe-edit"></i>
                    <span class="side-menu__label">Header Slider</span>
                </a>
            </li>

            @if(auth()->user()->is_super_admin)
                <li>
                    <a href="{{ route('admin.users.index') }}" class="side-menu__item {{ request()->routeIs('admin.users.index') ? 'active' : '' }}">
                        <i class="side-menu__icon fe fe-edit"></i>
                        <span class="side-menu__label">Manage Users</span>
                    </a>
                </li>
            @endif

            <li>
                <a href="{{ route('admin.coverage.districts.index') }}" class="side-menu__item {{ request()->routeIs('admin.coverage.districts.index') ? 'active' : '' }}">
                    <i class="side-menu__icon fe fe-edit"></i>
                    <span class="side-menu__label">Coverage Area</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.testimonials.index') }}" class="side-menu__item {{ request()->routeIs('admin.testimonials.index') ? 'active' : '' }}">
                    <i class="side-menu__icon fe fe-edit"></i>
                    <span class="side-menu__label">Testimonials</span>
                </a>
            </li>


            {{-- Plans --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="side-menu__icon fe fe-list"></i>
                    <span class="side-menu__label">Plans</span>
                    <i class="angle fa fa-angle-right"></i>
                </a>
                <ul class="slide-menu">
                    <li>
                        <a href="{{ route('admin.services.home.index') }}" class="slide-item {{ request()->routeIs('admin.services.home.index') ? 'active' : '' }}">Home Internet</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.services.business.index') }}" class="slide-item {{ request()->routeIs('admin.services.business.index') ? 'active' : '' }}">Business Internet</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.custom_plan_settings.index') }}" class="slide-item {{ request()->routeIs('admin.custom_plan_settings.index') ? 'active' : '' }}">Custom Plans</a>
                    </li>
                </ul>
            </li>

            {{-- Why Choose Us? --}}
            {{-- Why Fiber World? --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="side-menu__icon fe fe-list"></i>
                    <span class="side-menu__label">Why Choose Us</span>
                    <i class="angle fa fa-angle-right"></i>
                </a>
                <ul class="slide-menu">
                    <li>
                        <a href="{{ route('admin.whyfiberworld.home.index') }}" class="slide-item">Home Internet
                            Page</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.whyfiberworld.business.index') }}" class="slide-item">Business
                            Internet Page</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.whyfiberworld.dedicatedleasedline.index') }}"
                            class="slide-item">Dedicated Leased Line Page</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.plansandpricing.whyfiberworld.index') }}" class="slide-item">Plans and
                            Pricing Page</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.values.index') }}" class="slide-item">About Us</a>
                    </li>
                </ul>
            </li>

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="side-menu__icon fe fe-list"></i>
                    <span class="side-menu__label">FAQs</span>
                    <i class="angle fa fa-angle-right"></i>
                </a>
                <ul class="slide-menu">
                    <li>
                        <a href="{{ route('admin.plansandpricing.faq.index') }}" class="slide-item">Plans and
                            Pricing Page</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.faqs.home.index') }}" class="slide-item">Home Internet Page</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.faq-categories.index') }}" class="slide-item">Support Page</a>
                    </li>
                </ul>
            </li>

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="side-menu__icon fe fe-list"></i>
                    <span class="side-menu__label">Requests Submissions</span>
                    <i class="angle fa fa-angle-right"></i>
                </a>
                <ul class="slide-menu">
                    <li>
                        <a href="{{ route('admin.contacts.index') }}" class="slide-item">Contact Submissions</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.issueReport.index') }}" class="slide-item">Issue Report Submissions</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.inquiries.index') }}" class="slide-item">Inquiry Submissions</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.custom_plans.index') }}" class="slide-item">Custom Plan Requests
                            Submissions</a>
                    </li>
                </ul>
            </li>

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="side-menu__icon fe fe-list"></i>
                    <span class="side-menu__label">About Us Intro</span>
                    <i class="angle fa fa-angle-right"></i>
                </a>
                <ul class="slide-menu">
                    <li>
                        <a href="{{ route('admin.about_intro.index') }}" class="slide-item">Intro</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>