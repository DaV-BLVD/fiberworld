<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\WhyFiberWorldHome;
use App\Models\WhyFiberWorldBusiness;
use App\Models\WhyFiberWorldDedicatedLeasedLine;
use App\Models\Faq;
use App\Models\Value;
use App\Models\HeroSlider;
use App\Models\Service;
use App\Models\Plan;
use App\Models\PlansandPricingWhyFiberWorld;
use App\Models\ContactSubmission;
use App\Models\IssueReport;
use App\Models\Inquiry;
use App\Models\AboutIntro;
use App\Models\PlansandPricingFaq;
use App\Models\HomeFaq;
use App\Models\FaqCategory;

class DashboardController extends Controller
{
    public function index()
    {

        $faq_tables_to_count = [
            'plans_&_pricing_faq',
            'home_internet_faq',
            'faq_categories_faq'
        ];

        $faq_tables_count = count($faq_tables_to_count);


        $summary = [
            'hero_slider_count' => HeroSlider::count(),
            'users_count' => User::count(),
            'services_count' => Service::count(),  // no of plans Counts
            'home_plans' => Plan::where('service_id', 1)->count(),
            'business_plans' => Plan::where('service_id', 2)->count(),
            'plans_total' => Plan::count(),  // home and business plans count

            // Why Choose Us Counts
            'why_total' => WhyFiberWorldHome::count() + WhyFiberWorldBusiness::count() +
                WhyFiberWorldDedicatedLeasedLine::count() +
                PlansandPricingWhyFiberWorld::count() +
                Value::count(),
            'why_home_count' => WhyFiberWorldHome::count(),
            'why_business_count' => WhyFiberWorldBusiness::count(),
            'why_dedicated_count' => WhyFiberWorldDedicatedLeasedLine::count(),
            'why_plans_and_pricing_count' => PlansandPricingWhyFiberWorld::count(),
            'why_about_us_count' => Value::count(),

            // FAQ Counts
            'faqs_total' => PlansandPricingFaq::count() + HomeFaq::count() + FaqCategory::count(),
            'plans_and_pricing_faq_count' => PlansandPricingFaq::count(),
            'home_internet_faq_count' => HomeFaq::count(),
            'support_page' => FaqCategory::count(),

            // Contact Us
            'total_contact_submissions' => ContactSubmission::count() + IssueReport::count() + Inquiry::count(),
            'contact_messages_count' => ContactSubmission::count(),
            'issues_reported_count' => IssueReport::count(),
            'inquiries_count' => Inquiry::count(),
            
            'about_intro_count' => AboutIntro::count(),
        ];



        return view('admin.dashboard_summary.index', compact('summary'));
    }
}
