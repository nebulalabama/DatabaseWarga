<?php

use App\Http\Controllers\CommunityUnitsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FamilyCardController;
use App\Http\Controllers\GeneralsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MigrationsController;
use App\Http\Controllers\NeighborhoodsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\SubDistrictController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Get Token CSRF - JANGAN DIAPUSSS!!
Route::get('/token', function () {
    return csrf_token();
});

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    // Logika Login
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.auth');

    Route::get('/password/reset', function () {
        return view('pages.auth.lupa_password');
    })->name('password.request');
});

// LOG OUT
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard
Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Read & Update Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/edit-password', [ProfileController::class, 'update_password'])->name('profile.update.password');

    // Edit & Update Password
    Route::get('/change_password', [ProfileController::class, 'edit_password'])->name('profile.edit_password');
    Route::post('/change_password', [ProfileController::class, 'update_password'])->name('profile.update_password');

    // MANAJEMEN PENGGUNA
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    // resources
    // Route::resource('profile', ProfileController::class);
    Route::resource('residents', ResidentController::class);
    Route::resource('sub_districts', SubDistrictController::class);
    Route::resource('community_units', CommunityUnitsController::class);
    Route::resource('neighborhoods', NeighborhoodsController::class);
    Route::resource('family', FamilyCardController::class);
    Route::resource('documents', DocumentController::class);
    Route::resource('migrations', MigrationsController::class);

    Route::get('/generals', [GeneralsController::class, 'edit'])->name('general.edit');
    Route::put('/generals', [GeneralsController::class, 'update'])->name('general.update');
});

// NOTE : route yg ini saya pindahin ke atas(digabung dengan dashboard) &digabung middleware,
// cara ngakses nya tinggal tambahin '/dashboard/ sebelum route nya. CONTOH : '/dashboard/users'

// Route::get('/neighborhoods', [NeighborhoodsController::class, 'index']);
// Route::get('/neighborhoods/create', [NeighborhoodsController::class, 'create']);
// Route::post('/neighborhoods', [NeighborhoodsController::class, 'store']);
// Route::get('/neighborhoods/{id}', [NeighborhoodsController::class, 'show']);
// Route::put('/neighborhoods/{id}', [NeighborhoodsController::class, 'update']);
// Route::delete('/neighborhoods/{id}', [NeighborhoodsController::class, 'destroy']);

// Route::view('/blank', 'blank')->name('blank');

// Route::view('/index', 'users.index')->name('index');
// Route::view('/create', 'users.create')->name('create');
// Route::view('/edit', 'users.edit')->name('edit');
// Route::view('/show', 'users.show')->name('show');
// Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
// Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

// manajemen Users
// Route::view('/index', 'users.index')->name('users.index');
// Route::view('/create', 'users.create')->name('users.create');
// Route::view('/edit', 'users.edit')->name('users.edit');
// Route::view('/show', 'users.show')->name('users.show');

// //manajemen RT
// Route::view('/neighborhood', 'neighborhoods.index')->name('index');
// Route::view('/neighborhood/create', 'neighborhoods.create')->name('create');
// Route::view('/neighborhood/edit', 'neighborhoods.edit')->name('edit');
// Route::view('/neighborhood/show', 'neighborhoods.show')->name('show');

// //manajemen RW
// Route::view('/comunity', 'comunity.index')->name('index');
// Route::view('/comunity/create', 'comunity.create')->name('create');
// Route::view('/comunity/edit', 'comunity.edit')->name('edit');
// Route::view('/comunity/show', 'comunity.show')->name('show');

// //manajemen kelurahan
// Route::view('/district', 'district.index')->name('index');
// Route::view('/district/create', 'district.create')->name('create');
// Route::view('/district/edit', 'district.edit')->name('edit');
// Route::view('/district/show', 'district.show')->name('show');

// route::view('/penduduk','penduduk.index')->name('index');
// route::view('/penduduk/show','penduduk.show')->name('show');
// route::view('/penduduk/edit','penduduk.edit')->name('edit');
// route::view('/penduduk/create','penduduk.create')->name('create');
// SETTING
Route::view('/setting', 'layouts.setting')->name('setting');