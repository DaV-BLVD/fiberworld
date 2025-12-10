<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\aboutController;
use App\Http\Controllers\Frontend\contact_Controller;
use App\Http\Controllers\Frontend\dedicated_leased_lineController;
use App\Http\Controllers\Frontend\faqController;
use App\Http\Controllers\Frontend\get_startedController;
use App\Http\Controllers\Frontend\plansController;
use App\Http\Controllers\Frontend\report_issueController;
use App\Http\Controllers\Frontend\coverageController;
use App\Http\Controllers\InquiryController;

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\IssueReportController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Frontend\CustomPlanRequestController;


Route::get('/about', [aboutController::class, 'index']);
Route::get('/contact', [contact_Controller::class, 'index']);
Route::get('/coverage', [coverageController::class, 'index']);
Route::get('/dedicated-leased-line', [dedicated_leased_lineController::class, 'index']);
Route::get('/faq', [faqController::class, 'index']);
Route::get('/get_started', [get_startedController::class, 'index']);
Route::get('/plans', [plansController::class, 'index']);
Route::get('/report_issue', [report_issueController::class, 'index']);


// frontend routes for services
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('service.show');

// Route::get('/', [ServiceController::class, 'index']);
Route::get('/home-internet', [ServiceController::class, 'homeInternet'])->name('home_internet');
Route::get('/business-internet', [App\Http\Controllers\ServiceController::class, 'businessInternet'])->name('business_internet');
Route::get(uri: '/plans', action: [App\Http\Controllers\PlanController::class, 'index'])->name('plans');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/report-issue', [IssueReportController::class, 'store'])->name('report-issue.store');
Route::post('/get-started', [InquiryController::class, 'store'])->name('inquiry.store');
Route::get('/', [HomeController::class, 'index']);


// Route::post('/custom-plan-request', [CustomPlanRequestController::class, 'store'])->name('custom_plan.store');
Route::post('/custom-plan/store', [CustomPlanRequestController::class, 'store'])->name('custom_plan.store');


// Admin Routes (dashboard) 

use App\Http\Controllers\Admin\HomePlanController;
use App\Http\Controllers\Admin\BusinessPlanController;
use App\Http\Controllers\Admin\WhyFiberWorldHomeController;
use App\Http\Controllers\Admin\WhyFiberWorldBusinessController;
use App\Http\Controllers\Admin\WhyFiberWorldDedicatedLeasedLineController;
use App\Http\Controllers\Admin\PlansandPricingWhyFiberWorldController;
use App\Http\Controllers\Admin\PlansandPricingFaqController;
use App\Http\Controllers\Admin\HomeFaqController;
use App\Http\Controllers\Admin\FaqCategoryController;
use App\Http\Controllers\Admin\ValueController;
use App\Http\Controllers\Admin\AboutIntroController;
use App\Http\Controllers\Admin\HeroSliderController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CustomPlanSettingController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\TestimonialController;


Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::prefix('services/home')->name('services.home.')->group(function () {

        Route::get('/', [HomePlanController::class, 'index'])->name('index');
        Route::get('/create', [HomePlanController::class, 'create'])->name('create');
        Route::post('/', [HomePlanController::class, 'store'])->name('store');
        Route::get('/{plan}/edit', [HomePlanController::class, 'edit'])->name('edit');
        Route::put('/{plan}', [HomePlanController::class, 'update'])->name('update');
        Route::delete('/{plan}', [HomePlanController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('services/business')->name('services.business.')->group(function () {

        Route::get('/', [BusinessPlanController::class, 'index'])->name('index');
        Route::get('/create', [BusinessPlanController::class, 'create'])->name('create');
        Route::post('/', [BusinessPlanController::class, 'store'])->name('store');
        Route::get('/{plan}/edit', [BusinessPlanController::class, 'edit'])->name('edit');
        Route::put('/{plan}', [BusinessPlanController::class, 'update'])->name('update');
        Route::delete('/{plan}', [BusinessPlanController::class, 'destroy'])->name('destroy');
    });


    Route::prefix('whyfiberworld/home')->name('whyfiberworld.home.')->group(function () {

        Route::get('/', [WhyFiberWorldHomeController::class, 'index'])->name('index');

        Route::get('/create', [WhyFiberWorldHomeController::class, 'create'])->name('create');

        Route::post('/store', [WhyFiberWorldHomeController::class, 'store'])->name('store');

        Route::get('/edit/{id}', [WhyFiberWorldHomeController::class, 'edit'])->name('edit');

        Route::post('/update/{id}', [WhyFiberWorldHomeController::class, 'update'])->name('update');

        Route::delete('/delete/{id}', [WhyFiberWorldHomeController::class, 'destroy'])->name('delete');

    });

    Route::prefix('whyfiberworld/business')->name('whyfiberworld.business.')->group(function () {

        Route::get('/', [WhyFiberWorldBusinessController::class, 'index'])->name('index');

        Route::get('/create', [WhyFiberWorldBusinessController::class, 'create'])->name('create');

        Route::post('/store', [WhyFiberWorldBusinessController::class, 'store'])->name('store');

        Route::get('/edit/{id}', [WhyFiberWorldBusinessController::class, 'edit'])->name('edit');

        Route::post('/update/{id}', [WhyFiberWorldBusinessController::class, 'update'])->name('update');

        Route::delete('/delete/{id}', [WhyFiberWorldBusinessController::class, 'destroy'])->name('delete');

    });

    Route::prefix('whyfiberworld/dedicatedleasedline')->name('whyfiberworld.dedicatedleasedline.')->group(function () {

        Route::get('/', [WhyFiberWorldDedicatedLeasedLineController::class, 'index'])->name('index');

        Route::get('/create', [WhyFiberWorldDedicatedLeasedLineController::class, 'create'])->name('create');

        Route::post('/store', [WhyFiberWorldDedicatedLeasedLineController::class, 'store'])->name('store');

        Route::get('/edit/{id}', [WhyFiberWorldDedicatedLeasedLineController::class, 'edit'])->name('edit');

        Route::post('/update/{id}', [WhyFiberWorldDedicatedLeasedLineController::class, 'update'])->name('update');

        Route::delete('/delete/{id}', [WhyFiberWorldDedicatedLeasedLineController::class, 'destroy'])->name('delete');

    });

    Route::prefix('plansandpricing/whyfiberworld')->name('plansandpricing.whyfiberworld.')->group(function () {

        Route::get('/', [PlansandPricingWhyFiberWorldController::class, 'index'])->name('index');

        Route::get('/create', [PlansandPricingWhyFiberWorldController::class, 'create'])->name('create');

        Route::post('/store', [PlansandPricingWhyFiberWorldController::class, 'store'])->name('store');

        Route::get('/edit/{id}', [PlansandPricingWhyFiberWorldController::class, 'edit'])->name('edit');

        Route::post('/update/{id}', [PlansandPricingWhyFiberWorldController::class, 'update'])->name('update');

        Route::delete('/delete/{id}', [PlansandPricingWhyFiberWorldController::class, 'destroy'])->name('delete');

    });

    Route::prefix('plansandpricing/faq')->name('plansandpricing.faq.')->group(function () {

        Route::get('/', [PlansandPricingFaqController::class, 'index'])->name('index');

        Route::get('/create', [PlansandPricingFaqController::class, 'create'])->name('create');

        Route::post('/store', [PlansandPricingFaqController::class, 'store'])->name('store');

        Route::get('/edit/{id}', [PlansandPricingFaqController::class, 'edit'])->name('edit');

        Route::post('/update/{id}', [PlansandPricingFaqController::class, 'update'])->name('update');

        Route::delete('/delete/{id}', [PlansandPricingFaqController::class, 'destroy'])->name('delete');

    });

    Route::prefix('faqs/home')->name('faqs.home.')->group(function () {

        Route::get('/', [HomeFaqController::class, 'index'])->name('index');

        Route::get('/create', [HomeFaqController::class, 'create'])->name('create');

        Route::post('/store', [HomeFaqController::class, 'store'])->name('store');

        Route::get('/edit/{id}', [HomeFaqController::class, 'edit'])->name('edit');

        Route::post('/update/{id}', [HomeFaqController::class, 'update'])->name('update');

        Route::delete('/delete/{id}', [HomeFaqController::class, 'destroy'])->name('delete');

    });

    Route::prefix('faq-categories')->name('faq-categories.')->group(function () {

        Route::get('/', [FaqCategoryController::class, 'index'])->name('index');
        Route::get('/create', [FaqCategoryController::class, 'create'])->name('create');
        Route::post('/', [FaqCategoryController::class, 'store'])->name('store');

        Route::get('/{faqCategory}', [FaqCategoryController::class, 'show'])->name('show');

        Route::get('/{faqCategory}/edit', [FaqCategoryController::class, 'edit'])->name('edit');
        Route::put('/{faqCategory}', [FaqCategoryController::class, 'update'])->name('update');
        Route::delete('/{faqCategory}', [FaqCategoryController::class, 'destroy'])->name('destroy');

        // FAQ CRUD

    });

    Route::resource('faqs', \App\Http\Controllers\Admin\FaqController::class);

    Route::get('contacts', [\App\Http\Controllers\Admin\AdminContactController::class, 'index'])
        ->name('contacts.index');

    Route::get('contacts/{id}', [\App\Http\Controllers\Admin\AdminContactController::class, 'show'])
        ->name('contacts.show');

    Route::delete('contacts/{id}', [\App\Http\Controllers\Admin\AdminContactController::class, 'destroy'])
        ->name('contacts.destroy');

    Route::get('contacts/{id}', [\App\Http\Controllers\Admin\AdminContactController::class, 'show'])->name('contacts.show');




    Route::get('issue-report', [\App\Http\Controllers\Admin\AdminIssueReportController::class, 'index'])
        ->name('issueReport.index');

    Route::get('issue-report/{id}', [\App\Http\Controllers\Admin\AdminIssueReportController::class, 'show'])
        ->name('issueReport.show');

    Route::delete('issue-report/{id}', [\App\Http\Controllers\Admin\AdminIssueReportController::class, 'destroy'])
        ->name('issueReport.destroy');

    Route::patch('issue-report/{id}/resolve', [\App\Http\Controllers\Admin\AdminIssueReportController::class, 'markResolved'])
        ->name('issueReport.resolve');

    Route::patch('issue-report/{id}/undo', [\App\Http\Controllers\Admin\AdminIssueReportController::class, 'undoResolve'])
        ->name('issueReport.undo');




    Route::prefix('inquiries')->name('inquiries.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\AdminInquiryController::class, 'index'])->name('index');
        Route::get('/{id}', [\App\Http\Controllers\Admin\AdminInquiryController::class, 'show'])->name('show');
        Route::patch('/{id}/status', [\App\Http\Controllers\Admin\AdminInquiryController::class, 'updateStatus'])->name('updateStatus');
        Route::delete('/{id}', [\App\Http\Controllers\Admin\AdminInquiryController::class, 'destroy'])->name('destroy');
    });

    Route::resource('values', ValueController::class);

    Route::prefix('about_intro')->name('about_intro.')->group(function () {

        Route::get('/', [AboutIntroController::class, 'index'])
            ->name('index'); // admin.about-intro.index

        Route::get('/create', [AboutIntroController::class, 'create'])
            ->name('create'); // admin.about-intro.create

        Route::post('/store', [AboutIntroController::class, 'store'])
            ->name('store'); // admin.about-intro.store

        Route::get('/edit/{about_intro}', [AboutIntroController::class, 'edit'])->name('edit');


        Route::put('/update/{about_intro}', [AboutIntroController::class, 'update'])->name('update');
    });

    Route::resource('hero_sliders', HeroSliderController::class);

    Route::prefix('header_slider')->name('header_slider.')->group(function () {
        Route::get('/', [HeroSliderController::class, 'index'])->name('index');
    });


    Route::get('/profile', [AdminProfileController::class, 'show'])
        ->name('profile.show');

    // Edit admin profile
    Route::get('/profile/edit', [AdminProfileController::class, 'edit'])
        ->name('profile.edit');

    // Update admin profile
    Route::put('/profile/update', [AdminProfileController::class, 'update'])
        ->name('profile.update');

    Route::post('/profile/logout', [AdminProfileController::class, 'logout'])->name('profile.logout');

    // user controll
    Route::resource('users', UserController::class);

    // Only super admin can access Manage Users
    Route::middleware('superadmin')->group(function () {
        Route::resource('users', UserController::class);
    });


    Route::prefix('dashboard_summary')->name('dashboard_summary.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])
            ->name('index');
    });

    Route::prefix('custom-plan-settings')->name('custom_plan_settings.')->group(function () {
        Route::get('/', [CustomPlanSettingController::class, 'index'])->name('index');
        Route::get('/create', [CustomPlanSettingController::class, 'create'])->name('create');
        Route::post('/', [CustomPlanSettingController::class, 'store'])->name('store');
        Route::get('/{customPlanSetting}/edit', [CustomPlanSettingController::class, 'edit'])->name('edit');
        Route::put('/{customPlanSetting}', [CustomPlanSettingController::class, 'update'])->name('update');
        Route::delete('/{customPlanSetting}', [CustomPlanSettingController::class, 'destroy'])->name('destroy');
        Route::post('/{customPlanSetting}/activate', [App\Http\Controllers\Admin\CustomPlanSettingController::class, 'activate'])->name('activate');

    });


    Route::get('custom-plans', [App\Http\Controllers\Admin\CustomPlanRequestController::class, 'index'])
        ->name('custom_plans.index');

    Route::delete('custom-plans/{id}', [App\Http\Controllers\Admin\CustomPlanRequestController::class, 'destroy'])
        ->name('custom_plans.destroy');

    Route::get('custom-plans/{id}', [App\Http\Controllers\Admin\CustomPlanRequestController::class, 'show'])
        ->name('custom_plans.show');

    Route::post('custom-plans/{id}/status', [App\Http\Controllers\Admin\CustomPlanRequestController::class, 'updateStatus'])
        ->name('custom_plans.updateStatus');


    Route::prefix('coverage')->name('coverage.')->group(function () {

        // District CRUD
        Route::resource('districts', DistrictController::class);

        // Area CRUD
        Route::resource('areas', AreaController::class);

    });

    Route::prefix('testimonials')->name('testimonials.')->group(function () {
        Route::get('/', [TestimonialController::class, 'index'])->name('index');
        Route::get('/create', [TestimonialController::class, 'create'])->name('create');
        Route::post('/store', [TestimonialController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [TestimonialController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [TestimonialController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [TestimonialController::class, 'destroy'])->name('destroy');
    });
});


require __DIR__ . '/auth.php';
