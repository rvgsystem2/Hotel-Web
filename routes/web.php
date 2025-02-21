<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HeroSectionController;

use App\Http\Controllers\AboutSectionController;


Route::prefix('backend')->middleware(['auth'])->group(function () {
    Route::get('/about', [AboutSectionController::class, 'index'])->name('backend.about.index');
    Route::get('/about/create', [AboutSectionController::class, 'create'])->name('backend.about.create');
    Route::post('/about/store', [AboutSectionController::class, 'store'])->name('backend.about.store');
    Route::get('/about/edit/{about}', [AboutSectionController::class, 'edit'])->name('backend.about.edit');
    Route::put('/about/update/{about}', [AboutSectionController::class, 'update'])->name('backend.about.update');
    Route::delete('/about/destroy/{about}', [AboutSectionController::class, 'destroy'])->name('backend.about.destroy');
});


Route::middleware(['auth'])->group(function () {
    Route::resource('hero', HeroSectionController::class)->names([
        'index' => 'backend.hero.index',
        'create' => 'backend.hero.create',
        'store' => 'backend.hero.store',
        'edit' => 'backend.hero.edit',
        'update' => 'backend.hero.update',
        'destroy' => 'backend.hero.destroy',
    ]);
});


Route::prefix('')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('backend.register');
    Route::post('/register', [AuthController::class, 'register'])->name('register');

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('backend.login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::post('/logout', [AuthController::class, 'logout'])->name('backend.logout');

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    });
});

// This should also be protected by the auth middleware
Route::middleware('auth')->get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');







































































// Home route
Route::get('/', [HomeController::class, 'home'])->name('home');

// About route
Route::get('/about', [HomeController::class, 'about'])->name('about');

// Accommodation route
Route::get('/accommodation', [HomeController::class, 'accommodation'])->name('accommodation');

// Banquets and Meetings route
Route::get('/banquets-and-meetings', [HomeController::class, 'banquetsAndMeetings'])->name('banquets-and-meetings');

// Rules and Regulations route
Route::get('/rules-and-regulations', [HomeController::class, 'rulesAndRegulations'])->name('rules-and-regulations');

// Careers route
Route::get('/careers', [HomeController::class, 'careers'])->name('careers');

// Gallery route
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');

// Contact Us route
Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contact-us');




// Accommodation Routes
Route::get('/accommodation/standard-room', [HomeController::class, 'standardRoom'])->name('accommodation.standard');
Route::get('/accommodation/deluxe-room', [HomeController::class, 'deluxeRoom'])->name('accommodation.deluxe');
Route::get('/accommodation/luxury-suite', [HomeController::class, 'luxurySuite'])->name('accommodation.luxury');

// Banquets and Meetings Routes
Route::get('/banquets/lawn-package', [HomeController::class, 'lawnPackage'])->name('banquets.lawn');
Route::get('/banquets/ballroom-package', [HomeController::class, 'ballroomPackage'])->name('banquets.ballroom');

// footerpages
Route::get('/termandcondition', [HomeController::class, 'termandcondition'])->name('termandcondition');
Route::get('/conditions', [HomeController::class, 'conditions'])->name('conditons');
Route::get('/liability', [HomeController::class, 'liability'])->name('liability');
Route::get('/miscelleneous', [HomeController::class, 'miscelleneous'])->name('miscelleneous');
Route::get('/details', [HomeController::class, 'details'])->name('details');
Route::get('/information', [HomeController::class, 'information'])->name('information');
Route::get('/policy', [HomeController::class, 'policy'])->name('policy');