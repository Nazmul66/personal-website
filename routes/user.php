<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\PaymentController;

Route::group(['as' => 'user.', 'prefix' => 'user', 'middleware' => ['user']], function () {

    Route::post('profile-delete', [DashboardController::class, 'profileDelete'])->name('profile.delete');

    // User Dashboard
    Route::prefix('dashboard')->as('dashboard.')->group(function () {
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/', 'dashboard')->name('dashboard');
            Route::get('/plans-billing', 'plansBilling')->name('plansBilling');
            Route::get('/checkout/{plan}', 'showCheckout')->name('checkout');
            Route::get('/profile-details', 'profileDetails')->name('profileDetails');
            Route::post('/profile-update', 'profileUpdate')->name('profile.update');
            Route::post('/password-update', 'passwordUpdate')->name('password.update');
            Route::post('/password-update', 'passwordUpdate')->name('password.update');
            Route::get('/release-notes', 'releaseNotes')->name('releaseNotes');
            Route::get('/code-generator', 'codeGenerator')->name('codeGenerator');
            Route::get('/email-generator', 'emailGenerator')->name('emailGenerator');
            Route::get('/text-generator', 'textGenerator')->name('textGenerator');
            Route::get('/transactions', 'transactions')->name('transactions');
            Route::get('/invoice/{trx_id}', 'viewInvoice')->name('viewInvoice');
            Route::get('/invoice/download/{trx_id}', 'invoiceDownload')->name('invoiceDownload');

            Route::post('/process-payment', [PaymentController::class, 'processPayment'])->name('process.payment');
            Route::get('/payment-paypalsuccess', [PaymentController::class, 'paypalSuccess'])->name('payment.paypalSuccess');
            Route::get('/payment-stripesuccess', [PaymentController::class, 'stripeSuccess'])->name('payment.stripeSuccess');
            Route::get('/payment-cancel', [PaymentController::class, 'paymentCancel'])->name('payment.cancel');

            // Route::get('/appearance', 'appearance')->name('appearance');
            // Route::get('/application', 'application')->name('application');
            // Route::get('/chat-export', 'chatExport')->name('chatExport');
            // Route::get('/help', 'help')->name('help');
            // Route::get('/notification', 'notification')->name('notification');
            // Route::get('/sessions', 'sessions')->name('sessions');
            // Route::get('/image-editor', 'imageEditor')->name('imageEditor');
            // Route::get('/image-generator', 'imageGenerator')->name('imageGenerator');
            // Route::get('/video-generator', 'videoGenerator')->name('videoGenerator');
        });
    });

});
