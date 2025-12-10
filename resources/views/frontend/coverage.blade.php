@extends('frontend.layouts.main')

@section('main-container')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiberworld Communication Pvt. Ltd. - Coverage Area</title>

    <link rel="stylesheet" href="{{ url('frontend/coverage.css') }}">

    <!-- Page Hero Section -->
    <section class="page-hero-section"  style="background: url('assets/header-images/hjhjgh1.png');">
        <div class="container">
            <h1 class="display-4">Our Internet Coverage Across Nepal</h1>
            <p class="lead">We're constantly expanding to bring fast, reliable internet to more homes and businesses.</p>
        </div>
    </section>

    <!-- Coverage Map Section -->
    <section class="coverage-section section-padding" id="coverage">
        <div class="container">
            <h2 class="section-title mb-5">Available in 20+ Cities And Still Growing</h2>
            <p class="text-center lead mb-4">
                Fiberworld Communication Pvt. Ltd. provides internet to hundreds of communities across Nepal.
            </p>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <!-- Autocomplete Search -->
                    <div class="position-relative mb-3">
                        <input type="text" id="areaSearchInput" class="form-control" placeholder="Search District or Area">
                        <div id="autocompleteList"
                            class="autocomplete-items position-absolute w-100 bg-white border border-1"
                            style="z-index: 1000;"></div>
                    </div>
                    <button class="btn btn-primary w-100 mb-3" id="checkCoverageBtn">Check</button>

                    <div id="coverageResult" class="text-primary mb-3"></div>

                    <div id="map" style="width: 100%; height: 400px;"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Detailed Coverage List -->
    <section class="section-padding pt-0">
        <div class="container">
            <h3 class="text-center mb-4 text-primary fw-bold">Currently Serving In:</h3>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <ul class="coverage-list">
                        @foreach($districts as $district)
                            @php
                                $areas = $district->areas->pluck('area_name')->toArray();
                            @endphp
                            <li>
                                <i class="bi bi-geo-alt-fill"></i>
                                {{ $district->name }}
                                @if(count($areas) > 0)
                                    ({{ implode(', ', $areas) }})
                                @endif
                            </li>
                        @endforeach
                        <li><i class="bi bi-geo-alt-fill"></i> ...and continually expanding!</li>
                    </ul>
                    <p class="text-center mt-5 text-muted">
                        Don't see your area listed?
                        <a href="{{ url('/contact') }}" class="text-primary fw-bold">Contact us</a> to express your
                        interest, and we'll notify you when we expand to your locality!
                    </p>
                </div>
            </div>
        </div>
    </section>


    <!-- Call to Action / Contact Section -->
    <section class="cta-section">
        <div class="container">
            <h2 class="display-5 fw-bold mb-4">Can't Find Your Area?</h2>
            <p class="lead mb-4">Reach out to our team, and we'll check specific availability or add your request to our
                expansion plans!</p>
            <a href="{{ url('/contact') }}" class="btn btn-light btn-lg me-3"><i class="bi bi-telephone-fill me-2"></i> Get
                in Touch</a>
            <a href="{{ url('/plans') }}" class="btn btn-outline-light btn-lg"><i class="bi bi-lightning-fill me-2"></i>
                View Our Plans</a>
        </div>
    </section>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>


    <!-- Include Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const map = L.map('map').setView([28.3949, 84.1240], 7);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            // Locations from Laravel
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

            const areaSearchInput = document.getElementById('areaSearchInput');
            const autocompleteList = document.getElementById('autocompleteList');
            const coverageResult = document.getElementById('coverageResult');

            let marker, circle;

            // Flatten areas for autocomplete
            const allAreas = [];
            for (const district in locations) {
                for (const area in locations[district]) {
                    allAreas.push({ district, area, coords: locations[district][area] });
                }
            }

            // Function to create autocomplete suggestions
            function showSuggestions(value) {
                autocompleteList.innerHTML = '';
                if (!value) return;

                const filtered = allAreas.filter(entry =>
                    entry.area.toLowerCase().includes(value) || entry.district.toLowerCase().includes(value)
                );

                filtered.forEach(entry => {
                    const div = document.createElement('div');
                    div.textContent = `${entry.area}, ${entry.district}`;
                    div.classList.add('p-2', 'autocomplete-item', 'cursor-pointer');
                    div.addEventListener('click', function () {
                        areaSearchInput.value = this.textContent;
                        autocompleteList.innerHTML = '';
                    });
                    autocompleteList.appendChild(div);
                });
            }

            areaSearchInput.addEventListener('input', function () {
                showSuggestions(this.value.toLowerCase());
            });

            document.addEventListener('click', function (e) {
                if (!areaSearchInput.contains(e.target) && !autocompleteList.contains(e.target)) {
                    autocompleteList.innerHTML = '';
                }
            });

            // Check coverage
            document.getElementById('checkCoverageBtn').addEventListener('click', function () {
                const inputValue = areaSearchInput.value.trim().toLowerCase();
                const selected = allAreas.find(entry =>
                    `${entry.area}, ${entry.district}`.toLowerCase() === inputValue
                );

                if (!selected) {
                    coverageResult.textContent = "No coverage found for that area.";
                    return;
                }

                const [lat, lon] = selected.coords;
                if (marker) map.removeLayer(marker);
                if (circle) map.removeLayer(circle);

                marker = L.marker([lat, lon]).addTo(map)
                    .bindPopup(`${selected.area}, ${selected.district}`).openPopup();

                circle = L.circle([lat, lon], {
                    color: 'blue',
                    fillColor: '#30f',
                    fillOpacity: 0.3,
                    radius: 3000
                }).addTo(map);

                map.setView([lat, lon], 12);
                coverageResult.textContent = `Fiberworld internet is available in ${selected.area}, ${selected.district}!`;
            });
        });
    </script>

    <style>
        .autocomplete-items {
            max-height: 200px;
            overflow-y: auto;
        }

        .autocomplete-item:hover {
            background-color: #e9e9e9;
        }
    </style>
@endsection