<?php

use App\Http\Controllers\Admin\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\CustomSectionController;
use App\Http\Controllers\Admin\InstantContentController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\ContentGeneratorController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\AiContentController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\GeneratorToolController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\GuideContentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\PricingController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\CustomPageController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\HowWorksController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\PermissionsController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




//====================Admin Authentication=========================

Route::get('/admin', function () {
    return redirect()->route('login.admin');
});
Route::get('admin/login', [AdminLoginController::class, 'showLoginForm'])->name('login.admin');
Route::post('admin/login', [AdminLoginController::class, 'login'])->name('admin.login');
Route::post('admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');


Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth:admin'], 'where' => ['locale' => '[a-zA-Z]{2}']], function () {
// Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'where' => ['locale' => '[a-zA-Z]{2}']], function () {

        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/cc', [DashboardController::class, 'cacheClear'])->name('cacheClear');
        Route::get('/settings', [SettingsController::class, 'settings'])->name('settings');

    Route::get('lang/{locale}', function ($locale) {
        if ($locale) {
            App::setLocale($locale);
            Session::put('lang', $locale);
            Session::save();
            return redirect()->back()->with('locale', $locale);
        }
        return redirect()->back();
    })->name('lang.switch');


    // Roles
    Route::group(['prefix' => 'profiles', 'as' => 'profiles.'], function () {
        Route::get('/', [ProfileController::class, 'index'])->name('index');
        Route::get('/profile/edit', [ProfileController::class, 'profileEdit'])->name('profile_edit');
        Route::post('/profile/update', [ProfileController::class, 'profileUpdate'])->name('profile.update');
        Route::post('/password/update', [ProfileController::class, 'passwordUpdate'])->name('password.update');
    });

    // Admin
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::get('/create', [AdminController::class, 'create'])->name('create');
        Route::post('/store', [AdminController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [AdminController::class, 'edit'])->name('edit');
        Route::post('/{id}/update', [AdminController::class, 'update'])->name('update');
        Route::get('/{id}/view', [AdminController::class, 'view'])->name('view');
        Route::post('/{id}/password-update', [AdminController::class, 'passwordUpdate'])->name('password.update');
        Route::get('{id}/session-history', [AdminController::class, 'sessionView'])->name('viewSession');

    });


    // Roles
    Route::group(['prefix' => 'roles', 'as' => 'roles.'], function () {
        Route::get('/', [RolesController::class, 'index'])->name('index');
        Route::get('/create', [RolesController::class, 'create'])->name('create');
        Route::post('/store', [RolesController::class, 'store'])->name('store');
        Route::get('/{id}/show', [RolesController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [RolesController::class, 'edit'])->name('edit');
        Route::post('/{id}/update', [RolesController::class, 'update'])->name('update');
        // Route::delete('roles/{id}/destroy', [RolesController::class, 'destroy'])->name('roles.destroy');
    });


    //Custom Page
    Route::group(['prefix' => 'cpage', 'as' => 'cpage.'], function () {
        Route::get('/', [CustomPageController::class, 'index'])->name('index');
        Route::get('create', [CustomPageController::class, 'create'])->name('create');
        Route::post('store', [CustomPageController::class, 'store'])->name('store');
        Route::get('{id}/view', [CustomPageController::class, 'view'])->name('view');
        Route::get('{id}/edit', [CustomPageController::class, 'edit'])->name('edit');
        Route::post('{id}/update', [CustomPageController::class, 'update'])->name('update');
        Route::post('/toggle-status', [CustomPageController::class, 'toggleStatus'])->name('toggleStatus');
        // Route::get('{id}/delete', [CustomPageController::class, 'getDelete'])->name('delete');
    });


    // Route::group(['prefix' => 'custom-section', 'as' => 'custom-section.'], function () {
    //     Route::get('/{slug}', [CustomSectionController::class, 'index'])->name('index');
    //     Route::post('/banner-update/{id}', [CustomSectionController::class, 'banner_update'])->name('banner.update');
    //     Route::post('/about-us-update/{id}', [CustomSectionController::class, 'about_us_update'])->name('about.us.update');
    //     Route::post('/terms-condition-update/{id}', [CustomSectionController::class, 'terms_condition_update'])->name('terms.condition.update');
    //     Route::post('/privacy-policy-update/{id}', [CustomSectionController::class, 'privacy_policy_update'])->name('privacy.policy.update');
    //     // Route::get('/banner', [CustomSectionController::class, 'bannerSection'])->name('banner');
    //     // Route::get('/about-us', [CustomSectionController::class, 'aboutUs'])->name('about.us');
    //     // Route::get('/privacy-policy', [CustomSectionController::class, 'privacyPolicy'])->name('privacy.policy');
    //     // Route::get('/alert', [CustomSectionController::class, 'alertSection'])->name('alert');
    // });

    // Faq
    Route::group(['prefix' => 'faq', 'as' => 'faq.'], function () {
        Route::get('/', [FaqController::class, 'index'])->name('index');
        Route::get('/create', [FaqController::class, 'create'])->name('create');
        Route::post('/store', [FaqController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [FaqController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [FaqController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [FaqController::class, 'delete'])->name('delete');
        Route::get('/view/{id}', [FaqController::class, 'view'])->name('view');
        Route::post('/toggle-status', [FaqController::class, 'toggleStatus'])->name('toggleStatus');
        Route::post('/update-order', [FaqController::class, 'updateOrder'])->name('update.order');

    });

    // Brand
    Route::group(['prefix' => 'brand', 'as' => 'brand.'], function () {
        Route::get('/', [BrandController::class, 'index'])->name('index');
        Route::get('/create', [BrandController::class, 'create'])->name('create');
        Route::post('/store', [BrandController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [BrandController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [BrandController::class, 'delete'])->name('delete');
        Route::get('/view/{id}', [BrandController::class, 'view'])->name('view');
        Route::post('/toggle-status', [BrandController::class, 'toggleStatus'])->name('toggleStatus');

    });

    // Pricing
    Route::group(['prefix' => 'pricing', 'as' => 'pricing.'], function () {
        Route::get('/', [PricingController::class, 'index'])->name('index');
        Route::get('/create', [PricingController::class, 'create'])->name('create');
        Route::post('/store', [PricingController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [PricingController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [PricingController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [PricingController::class, 'delete'])->name('delete');
        Route::get('/view/{id}', [PricingController::class, 'view'])->name('view');
        Route::post('/toggle-status', [PricingController::class, 'toggleStatus'])->name('toggleStatus');
        Route::get('/duplicate/{id}', [PricingController::class, 'duplicate'])->name('duplicate');

    });


    // Content Generator
    Route::group(['prefix' => 'content-generator', 'as' => 'content-generator.'], function () {
        Route::get('/', [ContentGeneratorController::class, 'index'])->name('index');
        Route::get('/create', [ContentGeneratorController::class, 'create'])->name('create');
        Route::post('/store', [ContentGeneratorController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ContentGeneratorController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [ContentGeneratorController::class, 'update'])->name('update');
        Route::post('/section-update/{id}', [ContentGeneratorController::class, 'sectionupdate'])->name('section.update');
        Route::get('/delete/{id}', [ContentGeneratorController::class, 'delete'])->name('delete');
    });

    // Services
    Route::group(['prefix' => 'services', 'as' => 'services.'], function () {
        Route::get('/', [ServiceController::class, 'index'])->name('index');
        Route::get('/create', [ServiceController::class, 'create'])->name('create');
        Route::post('/store', [ServiceController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ServiceController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [ServiceController::class, 'update'])->name('update');
        Route::post('/section-update/{id}', [ServiceController::class, 'sectionupdate'])->name('section.update');
        Route::get('/delete/{id}', [ServiceController::class, 'delete'])->name('delete');
    });


    // Testimonials
    Route::group(['prefix' => 'testimonials', 'as' => 'testimonials.'], function () {
        Route::get('/', [TestimonialController::class, 'index'])->name('index');
        Route::get('/create', [TestimonialController::class, 'create'])->name('create');
        Route::post('/store', [TestimonialController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [TestimonialController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [TestimonialController::class, 'update'])->name('update');
        Route::post('/section-update/{id}', [TestimonialController::class, 'sectionupdate'])->name('section.update');
        Route::get('/delete/{id}', [TestimonialController::class, 'delete'])->name('delete');
    });


        // Projects
        Route::group(['prefix' => 'projects', 'as' => 'projects.'], function () {
            Route::get('/', [ProjectController::class, 'index'])->name('index');
            Route::get('/create', [ProjectController::class, 'create'])->name('create');
            Route::post('/store', [ProjectController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [ProjectController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [ProjectController::class, 'update'])->name('update');
            Route::post('/section-update/{id}', [ProjectController::class, 'sectionupdate'])->name('section.update');
            Route::get('/delete/{id}', [ProjectController::class, 'delete'])->name('delete');
        });

    // Generator Tool

    // How it works Content
    Route::group(['prefix' => 'how-works', 'as' => 'how-works.'], function () {
        Route::get('/', [HowWorksController::class, 'index'])->name('index');
        Route::get('/create', [HowWorksController::class, 'create'])->name('create');
        Route::post('/store', [HowWorksController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [HowWorksController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [HowWorksController::class, 'update'])->name('update');
        Route::post('/section-update/{id}', [HowWorksController::class, 'sectionupdate'])->name('section.update');
        Route::get('/delete/{id}', [HowWorksController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'customer', 'as' => 'customer.'], function () {
        Route::get('/', [CustomerController::class, 'index'])->name('index');
        Route::get('{id}/edit', [CustomerController::class, 'edit'])->name('edit');
        Route::post('{id}/update', [CustomerController::class, 'update'])->name('update');
        Route::get('{id}/view', [CustomerController::class, 'view'])->name('view');
        Route::get('{id}/session-history', [CustomerController::class, 'sessionView'])->name('viewSession');
        Route::get('/subscription/{id}', [CustomerController::class, 'fetchSubscriptionModal'])->name('subscriptionModal');
        Route::post('/assign-pricing', [CustomerController::class, 'assignPricing'])->name('assign.pricing');

    });




    // Users
    // Route::get('roles', 'RolesController@index')->name('roles.index');
    // Route::get('roles/create', 'RolesController@create')->name('roles.create');
    // Route::post('roles/store', 'RolesController@store')->name('roles.store');
    // Route::get('roles/{id}/show', 'RolesController@show')->name('roles.show');
    // Route::get('roles/{id}/edit', 'RolesController@edit')->name('roles.edit');
    // Route::post('roles/{id}/update', 'RolesController@update')->name('roles.update');
    // Route::delete('roles/{id}/destroy', 'RolesController@destroy')->name('roles.destroy');

    Route::get('permissions', [PermissionsController::class, 'index'])->name('permissions.index');
    Route::get('permissions/create', [PermissionsController::class, 'create'])->name('permissions.create');
    Route::post('permissions/store', [PermissionsController::class, 'store'])->name('permissions.store');
    Route::get('permissions/{id}/show', [PermissionsController::class, 'show'])->name('permissions.show');
    Route::get('permissions/{id}/edit', [PermissionsController::class, 'edit'])->name('permissions.edit');
    Route::post('permissions/{id}/update', [PermissionsController::class, 'update'])->name('permissions.update');
    Route::post('permissions/{id}/destroy', [PermissionsController::class, 'destroy'])->name('permissions.destroy');

    // Route::get('permissions', 'PermissionsController@index')->name('permissions.index');
    // Route::get('permissions/create', 'PermissionsController@create')->name('permissions.create');
    // Route::post('permissions/store', 'PermissionsController@store')->name('permissions.store');
    // Route::get('permissions/{id}/show', 'PermissionsController@show')->name('permissions.show');
    // Route::get('permissions/{id}/edit', 'PermissionsController@edit')->name('permissions.edit');
    // Route::post('permissions/{id}/update', 'PermissionsController@update')->name('permissions.update');
    // Route::post('permissions/{id}/destroy', 'PermissionsController@destroy')->name('permissions.destroy');

    // Route::get('user', 'UserController@index')->name('user.index');
    // Route::get('user/create', 'UserController@create')->name('user.create');
    // Route::post('user/store', 'UserController@store')->name('user.store');
    // Route::get('user/{id}/edit', 'UserController@edit')->name('user.edit');
    // Route::post('user/{id}/update', 'UserController@update')->name('user.update');
    // Route::get('user/{id}/destroy', 'UserController@destroy')->name('user.destroy');


    // Subscription
    Route::group(['prefix' => 'subscriptions', 'as' => 'subscription.'], function () {
        Route::get('/', [SubscriptionController::class, 'index'])->name('index');
        Route::get('{id}/view', [SubscriptionController::class, 'view'])->name('view');
        Route::get('{id}/delete', [SubscriptionController::class, 'delete'])->name('delete');
    });

    // Contacts
    Route::group(['prefix' => 'contact', 'as' => 'contact.'], function () {
        Route::get('/', [ContactController::class, 'index'])->name('index');
        Route::get('{id}/view', [ContactController::class, 'view'])->name('view');
        Route::get('{id}/delete', [ContactController::class, 'delete'])->name('delete');
        Route::post('/toggle-status', [ContactController::class, 'toggleStatus'])->name('toggleStatus');

    });


    // Banner
    Route::group(['prefix' => 'banner', 'as' => 'banner.'], function () {
        Route::get('/', [BannerController::class, 'index'])->name('index');
        Route::get('{id}/view', [BannerController::class, 'view'])->name('view');
        Route::post('{id}/update', [BannerController::class, 'update'])->name('update');
        Route::get('{id}/delete', [BannerController::class, 'delete'])->name('delete');
    });

    // Banner
    Route::group(['prefix' => 'about', 'as' => 'about.'], function () {
        Route::get('/', [AboutController::class, 'index'])->name('index');
        Route::get('{id}/view', [AboutController::class, 'view'])->name('view');
        Route::post('{id}/update', [AboutController::class, 'update'])->name('update');
        Route::get('{id}/delete', [AboutController::class, 'delete'])->name('delete');
    });


    // admin profile
    Route::get('profile', [DashboardController::class, 'adminProfile'])->name('profile');
    Route::post('profile-update', [DashboardController::class, 'profileUpdate'])->name('profile.update');
    Route::post('password-update', [DashboardController::class, 'passwordUpdate'])->name('password.update');



    Route::group(['prefix' => 'setting', 'as' => 'setting.'], function () {
        Route::get('/general-setting', [GeneralSettingController::class, 'general_setting'])->name('general.setting');
        Route::post('general/store', [GeneralSettingController::class, 'generalStore'])->name('general_store');
    });

    Route::group(['prefix' => 'transaction', 'as' => 'transaction.'], function () {
        Route::get('/', [TransactionController::class, 'index'])->name('index');
        Route::get('/invoice/{id}', [TransactionController::class, 'viewInvoice'])->name('invoice');
        Route::get('{id}/invoic-download', [TransactionController::class, 'invoiceDownload'])->name('invoice.download');
        Route::get('{id}/cancel', [TransactionController::class, 'statusCancel'])->name('order.cancel');
        Route::get('/stats', [TransactionController::class, 'getTransactionStatistics'])->name('getTransactionStatistics');
        // Route::get('{id}/complete', [TransactionController::class, 'statusComplete'])->name('order.complete');
    });

});
