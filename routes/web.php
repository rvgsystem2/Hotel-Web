<?php 
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\AboutSectionController;
use App\Http\Controllers\SmartServiceController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\InfoCardController;
use App\Http\Controllers\HotelOfferingController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\PackageController;


use App\Http\Controllers\RoomFeatureController;

Route::prefix('backend/room-features')->middleware('auth')->group(function () {
    Route::get('', [RoomFeatureController::class, 'index'])->name('backend.room_features.index');
    Route::get('create', [RoomFeatureController::class, 'create'])->name('backend.room_features.create');
    Route::post('store', [RoomFeatureController::class, 'store'])->name('backend.room_features.store');
    Route::get('edit/{roomFeature}', [RoomFeatureController::class, 'edit'])->name('backend.room_features.edit');
    Route::put('update/{roomFeature}', [RoomFeatureController::class, 'update'])->name('backend.room_features.update');
    Route::delete('delete/{roomFeature}', [RoomFeatureController::class, 'destroy'])->name('backend.room_features.destroy');
});




Route::prefix('backend/packages')->middleware('auth')->group(function () {
    Route::get('/', [PackageController::class, 'index'])->name('backend.packages.index');
    Route::get('create', [PackageController::class, 'create'])->name('backend.packages.create');
    Route::post('store', [PackageController::class, 'store'])->name('backend.packages.store');
    Route::get('edit/{package}', [PackageController::class, 'edit'])->name('backend.packages.edit');
    Route::put('/{package}', [PackageController::class, 'update'])->name('backend.packages.update');
    Route::delete('/{package}', [PackageController::class, 'destroy'])->name('backend.packages.destroy');
});


Route::prefix('backend/guests')->middleware('auth')->group(function () {
    Route::get('/', [GuestController::class, 'index'])->name('backend.guests.index');
    Route::get('/create', [GuestController::class, 'create'])->name('backend.guests.create');
    Route::post('/store', [GuestController::class, 'store'])->name('backend.guests.store');
    Route::get('/{guest}', [GuestController::class, 'show'])->name('backend.guests.show');
    Route::get('/{guest}/edit', [GuestController::class, 'edit'])->name('backend.guests.edit');
    Route::put('/{guest}', [GuestController::class, 'update'])->name('backend.guests.update');
    Route::delete('/{guest}', [GuestController::class, 'destroy'])->name('backend.guests.destroy');
});


// Route::prefix('backend/bookings')->middleware('auth')->group(function () {
//     Route::get('/', [BookingController::class, 'index'])->name('backend.bookings.index');
//     Route::get('/create', [BookingController::class, 'create'])->name('backend.bookings.create');
//     Route::post('/store', [BookingController::class, 'store'])->name('backend.bookings.store');
//     Route::get('/edit/{booking}', [BookingController::class, 'edit'])->name('backend.bookings.edit');
//     Route::put('/update/{booking}', [BookingController::class, 'update'])->name('backend.bookings.update');
//     Route::delete('/delete/{booking}', [BookingController::class, 'destroy'])->name('backend.bookings.destroy');
// });








Route::prefix('backend/rooms')->middleware('auth')->group(function () {
    Route::get('', [RoomController::class, 'index'])->name('backend.rooms.index'); 
    Route::get('create', [RoomController::class, 'create'])->name('backend.rooms.create');
    Route::post('store', [RoomController::class, 'store'])->name('backend.rooms.store');
    Route::get('edit/{room}', [RoomController::class, 'edit'])->name('backend.rooms.edit');
    Route::put('update/{room}', [RoomController::class, 'update'])->name('backend.rooms.update');
    Route::delete('delete/{room}', [RoomController::class, 'destroy'])->name('backend.rooms.destroy');
});



Route::prefix('backend/hotels')->middleware('auth')->group(function () {
    Route::get('/', [HotelController::class, 'index'])->name('backend.hotels.index');
    Route::get('/create', [HotelController::class, 'create'])->name('backend.hotels.create');
    Route::post('/store', [HotelController::class, 'store'])->name('backend.hotels.store');
    Route::get('/edit/{hotel}', [HotelController::class, 'edit'])->name('backend.hotels.edit');
    Route::put('/update/{hotel}', [HotelController::class, 'update'])->name('backend.hotels.update');
    Route::delete('/delete/{hotel}', [HotelController::class, 'destroy'])->name('backend.hotels.destroy');
});


Route::prefix('backend/room_types')->middleware('auth')->group(function () {
    Route::get('/', [RoomTypeController::class, 'index'])->name('backend.room_types.index');
    Route::get('/create', [RoomTypeController::class, 'create'])->name('backend.room_types.create');
    Route::post('/store', [RoomTypeController::class, 'store'])->name('backend.room_types.store');
    Route::get('/edit/{roomType}', [RoomTypeController::class, 'edit'])->name('backend.room_types.edit');
    Route::put('/update/{roomType}', [RoomTypeController::class, 'update'])->name('backend.room_types.update');
    Route::delete('/delete/{roomType}', [RoomTypeController::class, 'destroy'])->name('backend.room_types.destroy');
});






Route::prefix('backend/faq')->group(function () {
    Route::get('/', [FaqController::class, 'index'])->name('backend.faq.index');
    Route::get('/create', [FaqController::class, 'create'])->name('backend.faq.create');
    Route::post('/store', [FaqController::class, 'store'])->name('backend.faq.store');
    Route::get('/edit/{faq}', [FaqController::class, 'edit'])->name('backend.faq.edit');
    Route::put('/update/{faq}', [FaqController::class, 'update'])->name('backend.faq.update');
    Route::delete('/delete/{faq}', [FaqController::class, 'destroy'])->name('backend.faq.destroy');
});


Route::prefix('backend/contact')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('backend.contact.index');
    Route::get('/create', [ContactController::class, 'create'])->name('backend.contact.create');
    Route::post('/store', [ContactController::class, 'store'])->name('backend.contact.store');
    Route::get('/edit/{contact}', [ContactController::class, 'edit'])->name('backend.contact.edit');
    Route::put('/update/{contact}', [ContactController::class, 'update'])->name('backend.contact.update');
    Route::delete('/delete/{contact}', [ContactController::class, 'destroy'])->name('backend.contact.destroy');
});






Route::prefix('backend/testimonial')->group(function () {
    Route::get('/', [TestimonialController::class, 'index'])->name('backend.testimonial.index');
    Route::get('/create', [TestimonialController::class, 'create'])->name('backend.testimonial.create');
    Route::post('/store', [TestimonialController::class, 'store'])->name('backend.testimonial.store');
    Route::get('/edit/{testimonial}', [TestimonialController::class, 'edit'])->name('backend.testimonial.edit');
    Route::put('/update/{testimonial}', [TestimonialController::class, 'update'])->name('backend.testimonial.update');
    Route::delete('/delete/{testimonial}', [TestimonialController::class, 'destroy'])->name('backend.testimonial.destroy');
});





Route::prefix('backend/info_cards')->group(function () {
    Route::get('/', [InfoCardController::class, 'index'])->name('backend.info_cards.index');
    Route::get('/create', [InfoCardController::class, 'create'])->name('backend.info_cards.create');
    Route::post('/store', [InfoCardController::class, 'store'])->name('backend.info_cards.store');
    Route::get('/edit/{infoCard}', [InfoCardController::class, 'edit'])->name('backend.info_cards.edit');
    Route::put('/update/{infoCard}', [InfoCardController::class, 'update'])->name('backend.info_cards.update');
    Route::delete('/delete/{infoCard}', [InfoCardController::class, 'destroy'])->name('backend.info_cards.destroy');
});

Route::prefix('backend/hotel_offerings')->group(function () {
    Route::get('/', [HotelOfferingController::class, 'index'])->name('backend.hotel_offerings.index');
    Route::get('/create', [HotelOfferingController::class, 'create'])->name('backend.hotel_offerings.create');
    Route::post('/store', [HotelOfferingController::class, 'store'])->name('backend.hotel_offerings.store');
    Route::get('/edit/{hotelOffering}', [HotelOfferingController::class, 'edit'])->name('backend.hotel_offerings.edit');
    Route::put('/update/{hotelOffering}', [HotelOfferingController::class, 'update'])->name('backend.hotel_offerings.update');
    Route::delete('/delete/{hotelOffering}', [HotelOfferingController::class, 'destroy'])->name('backend.hotel_offerings.destroy');
});



Route::prefix('backend/experiences')->group(function () {
    Route::get('/', [ExperienceController::class, 'index'])->name('backend.experiences.index');
    Route::get('/create', [ExperienceController::class, 'create'])->name('backend.experiences.create');
    Route::post('/store', [ExperienceController::class, 'store'])->name('backend.experiences.store');
    Route::get('/edit/{experience}', [ExperienceController::class, 'edit'])->name('backend.experiences.edit');
    Route::put('/update/{experience}', [ExperienceController::class, 'update'])->name('backend.experiences.update');
    Route::delete('/delete/{experience}', [ExperienceController::class, 'destroy'])->name('backend.experiences.destroy');
});






Route::prefix('backend')->middleware(['auth'])->name('backend.')->group(function () {
    Route::resource('smart_services', SmartServiceController::class);
});



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
