<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<nav class="navbar navbar-top navbar-expand-md bg-white shadow-sm" id="navbar-main">
    <div class="container-fluid d-flex align-items-center">

        <!-- Sidebar Toggle -->
        <a aria-label="Hide Sidebar" class="mr-3 ml-3 d-block" data-toggle="sidebar" href="#">
            <i class="bi bi-list fs-3"></i>
        </a>

        <!-- Push Everything Right -->
        <div class="ml-auto d-flex align-items-center">

            <!-- Fullscreen Button (desktop only) -->
            <a class="nav-link d-none d-md-block" id="fullscreen-button" style="cursor:pointer;">
                <i class="fe fe-maximize-2 fs-4"></i>
            </a>

            <!-- User Dropdown -->
            <div class="nav-item dropdown position-relative">
                <a class="nav-link d-flex align-items-center user-trigger" data-toggle="dropdown" href="#">
                    <img src="{{ asset('assets/img/faces/user.png') }}" class="rounded-circle" width="35" height="35">
                    <span class="d-none d-lg-inline ml-2">
                        {{ Auth::user()->name }}
                    </span>
                    <i class="bi bi-caret-down-fill ml-2 small d-none d-lg-inline"></i>
                </a>

                <div class="dropdown-menu dropdown-menu-right shadow user-dropdown">
                    <a class="dropdown-item" href="{{ route('admin.profile.show') }}">
                        <i class="ni ni-single-02 mr-2"></i> My Profile
                    </a>

                    <div class="dropdown-divider"></div>

                    <form method="POST" action="{{ route('admin.profile.logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="ni ni-user-run mr-2"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</nav>