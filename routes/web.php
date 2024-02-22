<?php

use App\Http\Controllers\NewsletterController;
use App\Models\Social;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home', [
        'socials' => Social::first(),
    ]);
});
Route::get('/manifest.json', function () {
    $manifestService = app(\App\Services\ManifestService::class);
    $manifest = $manifestService->generate();

    return response($manifest, 200)
        ->header('Content-Type', 'application/json');
});

Route::post('newsletter', NewsletterController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/hero', function () {
        return view('hero');
    })->middleware('can:is_admin')->name('hero');
    Route::get('/users', function () {
        return view('users');
    })->middleware('can:is_admin')->name('users');
    Route::get('/address', function () {
        return view('address');
    })->middleware('can:is_admin')->name('address');
    Route::get('/services', function () {
        return view('services');
    })->name('services');
    Route::get('/businessHours', function () {
        return view('businessHours');
    })->middleware('can:is_admin')->name('businessHours');
    Route::get('/appointments', function () {
        return view('appointments');
    })->name('appointments');
    Route::get('/gallery', function () {
        return view('gallery');
    })->name('gallery');
    Route::get('/socials', function () {
        return view('social');
    })->middleware('can:is_admin')->name('socials');
    Route::get('/seo', function () {
        return view('seo');
    })->middleware('can:is_admin')->name('seo');
});
