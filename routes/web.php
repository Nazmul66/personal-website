<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\DiscordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PagesController;
use Illuminate\Support\Facades\Auth;

Route::post('/user/logout', [LoginController::class, 'logout'])->name('user.logout');

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/subscription','subscription_store')->name('subscription');
});

Route::get('auth/discord', [DiscordController::class, 'redirectToDiscord'])->name('auth.discord');
Route::get('auth/discord/callback', [DiscordController::class, 'handleDiscordCallback']);
// Route::get('/dashboard', [HomesController::class, 'dashboard'])->name('dashboard');

Auth::routes();

    // setting
    Route::controller(PagesController::class)->group(function () {
        // Route::get('/blog', 'blog')->name('blog');
        // Route::get('/blogdetails','blogDetails')->name('blogDetails');
        Route::get('/contact','contact')->name('contact');
        Route::post('/contact/store','contact_store')->name('contact.store');
        Route::get('/pricing','pricing')->name('pricing');
        Route::get('/roadmap','roadmap')->name('roadmap');
        Route::get('/faq','faq')->name('faq');
        Route::get('/signup','signup')->name('signup');
        Route::get('/team','team')->name('team');
        Route::get('/about','about')->name('about');
        Route::get('/privacy-policy','privacy_policy')->name('privacy.policy');
        Route::get('/terms-condition','terms_condition')->name('terms.condition');
        Route::get('/pages/{slug}','customPage')->name('customPage');
    });

require __DIR__.'/user.php';
require __DIR__.'/admin.php';
