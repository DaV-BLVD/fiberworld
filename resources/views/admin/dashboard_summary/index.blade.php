@extends('admin.layouts.app')

@section('content')
<div class="row">
    {{-- Left Table --}}
    <div class="col-md-6 px-3">
        <div class="card shadow-sm border-0 mb-3">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">📊 Dashboard Summary - Plans & Why Choose Us</h4>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th style="width: 60%; text-align: left;">Summary Item</th>
                            <th style="width: 40%; text-align: center;">Total Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Plans Category --}}
                        <tr style="background-color: #007bff; color: white; font-weight: bold; font-size: 1.1rem; cursor:pointer;"
                            onclick="window.location='{{ route('admin.services.home.index') }}'">
                            <td>Total Plans</td>
                            <td style="text-align: center;">{{ $summary['plans_total'] }}</td>
                        </tr>
                        <tr style="cursor:pointer;" onclick="window.location='{{ route('admin.services.home.index') }}'">
                            <td style="padding-left: 30px;">Home Plans</td>
                            <td style="text-align: center;">{{ $summary['home_plans'] }}</td>
                        </tr>
                        <tr style="cursor:pointer;" onclick="window.location='{{ route('admin.services.business.index') }}'">
                            <td style="padding-left: 30px;">Business Plans</td>
                            <td style="text-align: center;">{{ $summary['business_plans'] }}</td>
                        </tr>

                        {{-- Why Choose Us Category --}}
                        <tr style="background-color: #6c757d; color: white; font-weight: bold; font-size: 1.1rem; cursor:pointer;"
                            onclick="window.location='{{ route('admin.whyfiberworld.home.index') }}'">
                            <td>Why Choose Us</td>
                            <td style="text-align: center;">{{ $summary['why_total'] }}</td>
                        </tr>
                        <tr style="cursor:pointer;" onclick="window.location='{{ route('admin.whyfiberworld.home.index') }}'">
                            <td style="padding-left: 30px;">Home Internet Page</td>
                            <td style="text-align: center;">{{ $summary['why_home_count'] }}</td>
                        </tr>
                        <tr style="cursor:pointer;" onclick="window.location='{{ route('admin.whyfiberworld.business.index') }}'">
                            <td style="padding-left: 30px;">Business Internet Page</td>
                            <td style="text-align: center;">{{ $summary['why_business_count'] }}</td>
                        </tr>
                        <tr style="cursor:pointer;" onclick="window.location='{{ route('admin.whyfiberworld.dedicatedleasedline.index') }}'">
                            <td style="padding-left: 30px;">Dedicated Leased Line Page</td>
                            <td style="text-align: center;">{{ $summary['why_dedicated_count'] }}</td>
                        </tr>
                        <tr style="cursor:pointer;" onclick="window.location='{{ route('admin.plansandpricing.whyfiberworld.index') }}'">
                            <td style="padding-left: 30px;">Plans and Pricing Page</td>
                            <td style="text-align: center;">{{ $summary['why_plans_and_pricing_count'] }}</td>
                        </tr>
                        <tr style="cursor:pointer;" onclick="window.location='{{ route('admin.plansandpricing.whyfiberworld.index') }}'">
                            <td style="padding-left: 30px;">About Us</td>
                            <td style="text-align: center;">{{ $summary['why_about_us_count'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Right Table --}}
    <div class="col-md-6">
        <div class="card shadow-sm border-0 mb-3">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0">📊 Dashboard Summary - FAQs & Contact</h4>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th style="width: 60%; text-align: left;">Summary Item</th>
                            <th style="width: 40%; text-align: center;">Total Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- FAQs Category --}}
                        <tr style="background-color: #17a2b8; color: white; font-weight: bold; font-size: 1.1rem; cursor:pointer;"
                            onclick="window.location='{{ route('admin.faqs.home.index') }}'">
                            <td>FAQs</td>
                            <td style="text-align: center;">{{ $summary['faqs_total'] }}</td>
                        </tr>
                        <tr style="cursor:pointer;" onclick="window.location='{{ route('admin.plansandpricing.faq.index') }}'">
                            <td style="padding-left: 30px;">Plans and Pricing FAQs</td>
                            <td style="text-align: center;">{{ $summary['plans_and_pricing_faq_count'] }}</td>
                        </tr>
                        <tr style="cursor:pointer;" onclick="window.location='{{ route('admin.faqs.home.index') }}'">
                            <td style="padding-left: 30px;">Home Internet FAQs</td>
                            <td style="text-align: center;">{{ $summary['home_internet_faq_count'] }}</td>
                        </tr>
                        <tr style="cursor:pointer;" onclick="window.location='{{ route('admin.faq-categories.index') }}'">
                            <td style="padding-left: 30px;">Support Page</td>
                            <td style="text-align: center;">{{ $summary['support_page'] }}</td>
                        </tr>

                        {{-- Contact & Reports Category --}}
                        <tr style="background-color: #ffc107; color: black; font-weight: bold; font-size: 1.1rem; cursor:pointer;"
                            onclick="window.location='{{ route('admin.contacts.index') }}'">
                            <td>Contact & Reports</td>
                            <td style="text-align: center;">
                                {{ $summary['contact_messages_count'] + $summary['issues_reported_count'] + $summary['inquiries_count'] }}
                            </td>
                        </tr>
                        <tr style="cursor:pointer;" onclick="window.location='{{ route('admin.contacts.index') }}'">
                            <td style="padding-left: 30px;">Contact Submissions</td>
                            <td style="text-align: center;">{{ $summary['contact_messages_count'] }}</td>
                        </tr>
                        <tr style="cursor:pointer;" onclick="window.location='{{ route('admin.issueReport.index') }}'">
                            <td style="padding-left: 30px;">Issue Reports</td>
                            <td style="text-align: center;">{{ $summary['issues_reported_count'] }}</td>
                        </tr>
                        <tr style="cursor:pointer;" onclick="window.location='{{ route('admin.inquiries.index') }}'">
                            <td style="padding-left: 30px;">Inquiry Submissions</td>
                            <td style="text-align: center;">{{ $summary['inquiries_count'] }}</td>
                        </tr>

                        {{-- About Intro Category --}}
                        <tr style="background-color: #343a40; color: white; font-weight: bold; font-size: 1.1rem; cursor:pointer;"
                            onclick="window.location='{{ route('admin.about_intro.index') }}'">
                            <td>About Intro</td>
                            <td style="text-align: center;">{{ $summary['about_intro_count'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
