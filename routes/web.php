<?php 


use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\AboutSectionController;

Route::prefix('backend')->middleware(['auth'])->group(function () {
    // About Section Routes
    Route::get('/about', [AboutSectionController::class, 'index'])->name('backend.about.index');
    Route::get('/about/create', [AboutSectionController::class, 'create'])->name('backend.about.create');
    Route::post('/about/store', [AboutSectionController::class, 'store'])->name('backend.about.store');
    Route::get('/about/edit/{about}', [AboutSectionController::class, 'edit'])->name('backend.about.edit');
    Route::put('/about/update/{about}', [AboutSectionController::class, 'update'])->name('backend.about.update');
    Route::delete('/about/destroy/{about}', [AboutSectionController::class, 'destroy'])->name('backend.about.destroy');

    // AJAX Routes for Image Removal
    Route::post('/about/remove-main-image/{id}', [AboutSectionController::class, 'removeMainImage'])
    ->name('backend.about.remove-main-image');


    Route::post('/about/remove-gallery-image/{id}', [AboutSectionController::class, 'removeGalleryImage'])
        ->name('backend.about.remove-gallery-image');
});





// Hero Section Routes (Protected by auth middleware)
Route::middleware(['auth'])->group(function () {
    Route::resource('hero', HeroSectionController::class)->names([
        'index'   => 'backend.hero.index',
        'create'  => 'backend.hero.create',
        'store'   => 'backend.hero.store',
        'edit'    => 'backend.hero.edit',
        'update'  => 'backend.hero.update',
        'destroy' => 'backend.hero.destroy',
    ]);

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});

// Authentication Routes
Route::prefix('')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('backend.register');
    Route::post('/register', [AuthController::class, 'register'])->name('register');

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('backend.login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::post('/logout', [AuthController::class, 'logout'])->name('backend.logout');
});

// Public Routes
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/accommodation', [HomeController::class, 'accommodation'])->name('accommodation');
Route::get('/banquets-and-meetings', [HomeController::class, 'banquetsAndMeetings'])->name('banquets-and-meetings');
Route::get('/rules-and-regulations', [HomeController::class, 'rulesAndRegulations'])->name('rules-and-regulations');
Route::get('/careers', [HomeController::class, 'careers'])->name('careers');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contact-us');

// Accommodation Routes
Route::prefix('accommodation')->group(function () {
    Route::get('/standard-room', [HomeController::class, 'standardRoom'])->name('accommodation.standard');
    Route::get('/deluxe-room', [HomeController::class, 'deluxeRoom'])->name('accommodation.deluxe');
    Route::get('/luxury-suite', [HomeController::class, 'luxurySuite'])->name('accommodation.luxury');
});

// Banquets & Meetings Routes
Route::prefix('banquets')->group(function () {
    Route::get('/lawn-package', [HomeController::class, 'lawnPackage'])->name('banquets.lawn');
    Route::get('/ballroom-package', [HomeController::class, 'ballroomPackage'])->name('banquets.ballroom');
});

// Footer Pages
Route::prefix('footer')->group(function () {
    Route::get('/termandcondition', [HomeController::class, 'termandcondition'])->name('termandcondition');
    Route::get('/conditions', [HomeController::class, 'conditions'])->name('conditons');
    Route::get('/liability', [HomeController::class, 'liability'])->name('liability');
    Route::get('/miscelleneous', [HomeController::class, 'miscelleneous'])->name('miscelleneous');
    Route::get('/details', [HomeController::class, 'details'])->name('details');
    Route::get('/information', [HomeController::class, 'information'])->name('information');
    Route::get('/policy', [HomeController::class, 'policy'])->name('policy');
});
