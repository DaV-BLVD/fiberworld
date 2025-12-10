<link rel="stylesheet" href="public\frontend\footer.css">

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

<!-- Footer -->
<footer class="text-lg-start bg-dark text-white pt-5">
    <div class="container">
        <div class="row">
            <!-- Company Info -->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <div class="footer-brand">
                    <span class="fw-bold fs-4 text-primary">Fiberworld Communication Pvt. Ltd.</span>
                </div>
                <p class="text-white-50 mt-2">
                    Connecting Nepal with high-speed, reliable internet. Your trusted partner for digital connectivity.
                </p>
            </div>

            <!-- Services -->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-3">Services</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ url('/home-internet') }}" class="text-white-50 text-decoration-none">Home Internet</a></li>
                    <li><a href="{{ url('/business-internet') }}" class="text-white-50 text-decoration-none">Business Internet</a></li>
                    <li><a href="{{ url('/dedicated-leased-line') }}" class="text-white-50 text-decoration-none">Dedicated Leased Line</a></li>
                    <li><a href="{{ url('/plans') }}" class="text-white-50 text-decoration-none">View All Plans</a></li>
                </ul>
            </div>

            <!-- Support -->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-3">Support</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ url('/faq') }}" class="text-white-50 text-decoration-none">FAQ</a></li>
                    <li><a href="{{ url('/contact') }}" class="text-white-50 text-decoration-none">Contact Us</a></li>
                    <li><a href="{{ url('/report_issue') }}" class="text-white-50 text-decoration-none">Report an Issue</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-3">Contact Info</h5>
                <ul class="list-unstyled">
                    <li class="text-white-50"><i class="bi bi-geo-alt-fill me-2"></i> Naya Bazaar, Kathmandu</li>
                    <li class="text-white-50"><i class="bi bi-telephone-fill me-2"></i> 01-4965649, 9801133614</li>
                    <li class="text-white-50"><i class="bi bi-envelope-fill me-2"></i> info@fiberworld.com.np</li>
                </ul>

                <div class="social-icons mt-3">
                    <a href="https://www.facebook.com/fiberworldkathmandu" target="_blank"><i
                            class="bi bi-facebook"></i></a>
                    <a href="{{ url('/') }}" target="_blank"><i class="bi bi-twitter"></i></a>
                    <a href="{{ url('/') }}" target="_blank"><i class="bi bi-instagram"></i></a>
                    <a href="{{ url('/') }}" target="_blank"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom text-center py-3 mt-4 border-top border-secondary text-white-50">
        © 2023 Fiberworld Communication Pvt. Ltd. All rights reserved.
    </div>
</footer>
