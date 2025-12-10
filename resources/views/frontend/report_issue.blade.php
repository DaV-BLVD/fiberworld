@extends('frontend.layouts.main')

@section('main-container')
    <link rel="stylesheet" href="{{ url('frontend\report_issue.css') }}">

    <!-- Page Hero Section -->
    <section class="page-hero-section" style="background: url('assets/header-images/poiuy.png')">
        <div class="container">
            <h1 class="display-4">Report a Technical Issue</h1>
            <p class="lead">Experiencing problems with your internet connection? Let us know, and we'll help resolve it.
            </p>
        </div>
    </section>

    <!-- Report Issue Form Section -->
    <section class="report-issue-section section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="section-title">Describe Your Problem</h2>

                    {{-- Show success message --}}
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="alert alert-info" role="alert">
                        <i class="bi bi-info-circle-fill"></i>
                        <div>
                            <strong>Before reporting:</strong> Please try restarting your router/modem. Many common issues
                            are resolved with a simple reboot. You can also check our <a href="{{ url('/faq') }}"
                                class="alert-link text-primary fw-bold">FAQ page</a> for troubleshooting tips.
                        </div>
                    </div>

                    <div class="report-form-card">
                        <form action="{{ route('report-issue.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="fullName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="fullName" name="full_name"
                                    placeholder="Enter your full name" required value="{{ old('full_name') }}">
                                @error('full_name') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="contactNumber" class="form-label">Contact Number</label>
                                <input type="tel" class="form-control" id="contactNumber" name="contact_number"
                                    placeholder="+977-XXXXXXXXXX" required value="{{ old('contact_number') }}">
                                @error('contact_number') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="emailAddress" class="form-label">Email Address (Optional)</label>
                                <input type="email" class="form-control" id="emailAddress" name="email"
                                    placeholder="name@example.com" value="{{ old('email') }}">
                                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="serviceId" class="form-label">Your Digitech Service ID / Account Number (If
                                    available)</label>
                                <input type="text" class="form-control" id="serviceId" name="service_id"
                                    placeholder="e.g., DTN-12345" value="{{ old('service_id') }}">
                                @error('service_id') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="issueType" class="form-label">Type of Issue</label>
                                <select class="form-select" id="issueType" name="issue_type" required>
                                    <option value="" selected disabled>Select an issue type</option>
                                    <option value="no-internet" {{ old('issue_type') == 'no-internet' ? 'selected' : '' }}>No
                                        Internet Connection</option>
                                    <option value="slow-speed" {{ old('issue_type') == 'slow-speed' ? 'selected' : '' }}>Slow
                                        Internet Speed</option>
                                    <option value="intermittent-connection" {{ old('issue_type') == 'intermittent-connection' ? 'selected' : '' }}>Intermittent Connection</option>
                                    <option value="wifi-problem" {{ old('issue_type') == 'wifi-problem' ? 'selected' : '' }}>
                                        Wi-Fi / Router Problem</option>
                                    <option value="billing-issue" {{ old('issue_type') == 'billing-issue' ? 'selected' : '' }}>Billing / Account Issue</option>
                                    <option value="other" {{ old('issue_type') == 'other' ? 'selected' : '' }}>Other Technical
                                        Problem</option>
                                </select>
                                @error('issue_type') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="mb-4">
                                <label for="issueDescription" class="form-label">Describe Your Issue in Detail</label>
                                <textarea class="form-control" id="issueDescription" name="issue_description" rows="6"
                                    placeholder="Please provide as much detail as possible, including when the issue started, any error messages, and what troubleshooting steps you've already taken."
                                    required>{{ old('issue_description') }}</textarea>
                                @error('issue_description') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg w-100">Submit Report</button>
                        </form>
                    </div>

                    <p class="text-center mt-5 lead text-muted">For urgent issues, please call our support hotline directly
                        at <a href="tel:+977-9876543210" class="text-primary fw-bold">+977-9876543210</a>.
                    </p>
                </div>
            </div>
        </div>
    </section>


    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
@endsection