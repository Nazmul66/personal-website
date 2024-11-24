<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\GeneratorController;
use App\Http\Controllers\DashboardController;

Route::controller(HomeController::class)->group(function () {
Route::get('/', 'index')->name('index');
Route::get('/dashboard', 'dashboard')->name('dashboard');
});

// Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

// setting
Route::prefix('/pages')->group(function () {
    Route::controller(PagesController::class)->group(function () {
        Route::get('/blog', 'blog')->name('blog');
        Route::get('/blogdetails','blogDetails')->name('blogDetails');
        Route::get('/contact','contact')->name('contact');
        Route::get('/pricing','pricing')->name('pricing');
        Route::get('/privacypolicy','privacyPolicy')->name('privacyPolicy');
        Route::get('/roadmap','roadmap')->name('roadmap');
        Route::get('/signin','signin')->name('signin');
        Route::get('/signup','signup')->name('signup');
        Route::get('/styleguide','styleguide')->name('styleGuide');
        Route::get('/team','team')->name('team');
        Route::get('/termspolicy','termsPolicy')->name('termsPolicy');
        Route::get('/utilize','utilize')->name('utilize');
    });
});

// AI Pages
Route::prefix('generator')->group(function () {
    Route::controller(GeneratorController::class)->group(function () {
        Route::get('/codegenerator', 'codeGenerator')->name('codeGenerator');
        Route::get('/emailgenerator', 'emailGenerator')->name('emailGenerator');
        Route::get('/imageeditor', 'imageEditor')->name('imageEditor');
        Route::get('/imagegenerator', 'imageGenerator')->name('imageGenerator');
        Route::get('/textgenerator', 'textGenerator')->name('textGenerator');
        Route::get('/vediogenerator', 'vedioGenerator')->name('vedioGenerator');
        
    });
});

// AI Pages
Route::prefix('dashboard')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/appearance', 'appearance')->name('appearance');
        Route::get('/application', 'application')->name('application');
        Route::get('/chatexport', 'chatExport')->name('chatExport');
        Route::get('/help', 'help')->name('help');
        Route::get('/notification', 'notification')->name('notification');
        Route::get('/plansbilling', 'plansBilling')->name('plansBilling');
        Route::get('/profiledetails', 'profileDetails')->name('profileDetails');
        Route::get('/releasenotes', 'releaseNotes')->name('releaseNotes');
        Route::get('/sessions', 'sessions')->name('sessions');
        
    });
});
