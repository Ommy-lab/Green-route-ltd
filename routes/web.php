<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RequestController;
use App\Http\Controllers\Admin\QuotationController;
use App\Http\Controllers\CustomerQuotationController;
use App\Http\Controllers\Admin\RequestStatusController;
use App\Http\Controllers\Admin\CerealController;
use App\Http\Controllers\CerealPageController;
use App\Http\Controllers\Admin\AdministratorController;
use App\Http\Controllers\Admin\SettingsController;

Route::view('/', 'pages.home')->name('home');
Route::view('/about', 'pages.about')->name('about');
Route::view('/services', 'pages.services')->name('services');
Route::get('/cereals', [CerealPageController::class, 'index'])->name('cereals');
Route::view('/contact', 'pages.contact')->name('contact');

Route::get('/request-service', [
    ServiceRequestController::class,
    'create'
])->name('requests.create');

Route::post('/request-service', [
    ServiceRequestController::class,
    'store'
])->name('requests.store');

Route::get('/track-request/{token}', [
    ServiceRequestController::class,
    'track',
])->name('requests.track');

Route::get('/track-request', [
    ServiceRequestController::class,
    'showTrackForm',
])->name('requests.track.form');

Route::post('/track-request', [
    ServiceRequestController::class,
    'searchRequest',
])->name('requests.track.search');

Route::get('/track-request/{token}', [
    ServiceRequestController::class,
    'track',
])->name('requests.track');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [
            AuthController::class,
            'showLogin',
        ])->name('login');

        Route::post('/login', [
            AuthController::class,
            'login',
        ])->name('login.submit');
    });

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/dashboard', [
            DashboardController::class,
            'index',
        ])->name('dashboard');

        Route::get('/requests', [
            RequestController::class,
            'index',
        ])->name('requests.index');

        Route ::get('/requests/{serviceRequest}', [
            RequestController::class,
            'show',
        ])->name('requests.show');

        Route::post('/requests/{serviceRequest}/quotation', [
            QuotationController::class,
            'store',
        ])->name('requests.quotation.store');

        Route::patch('/requests/{serviceRequest}/status', [
            RequestStatusController::class,
            'update',
        ])->name('requests.status.update');

        Route::get('/administrators', [
        AdministratorController::class,
        'index',
        ])->name('administrators.index');

        Route::get('/administrators/create', [
        AdministratorController::class,
        'create',
        ])->name('administrators.create');

        Route::post('/administrators', [
    AdministratorController::class,
    'store',
        ])->name('administrators.store');

        Route::get('/administrators/{administrator}/edit', [
        AdministratorController::class,
        'edit',
        ])->name('administrators.edit');

        Route::put('/administrators/{administrator}', [
        AdministratorController::class,
        'update',
        ])->name('administrators.update');

        Route::delete('/administrators/{administrator}', [
        AdministratorController::class,
        'destroy',
        ])->name('administrators.destroy');

        Route::get('/settings', [
            SettingsController::class,
            'index',
        ])->name('settings.index');

        Route::post('/logout', [
            AuthController::class,
            'logout',
        ])->name('logout');

        Route::resource('cereals', CerealController::class)
        ->except(['show']);

Route::middleware(['super_admin'])->group(function () {
    Route::get('/administrators', [
        AdministratorController::class,
        'index',
    ])->name('administrators.index');

    Route::get('/administrators/create', [
        AdministratorController::class,
        'create',
    ])->name('administrators.create');

    Route::post('/administrators', [
        AdministratorController::class,
        'store',
    ])->name('administrators.store');

    Route::get('/administrators/{administrator}/edit', [
        AdministratorController::class,
        'edit',
    ])->name('administrators.edit');

    Route::put('/administrators/{administrator}', [
        AdministratorController::class,
        'update',
    ])->name('administrators.update');

    Route::delete('/administrators/{administrator}', [
        AdministratorController::class,
        'destroy',
    ])->name('administrators.destroy');

    Route::get('/settings', [
        SettingsController::class,
        'index',
    ])->name('settings.index');
});

    });
});

Route::get('/requests/{serviceRequest}', [
    RequestController::class,
    'show',
])->name('requests.show');

Route::post('/quotation/{quotation}/accept', [
    CustomerQuotationController::class,
    'accept',
])->name('quotation.accept');

Route::post('/quotation/{quotation}/reject', [
    CustomerQuotationController::class,
    'reject',
])->name('quotation.reject');