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

Auth::routes();


require __DIR__.'/user.php';
require __DIR__.'/admin.php';
