<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\KriteriaController;
use App\Http\Controllers\Dashboard\AlternatifController;
use App\Http\Controllers\Dashboard\HasilSmartController;
use App\Http\Controllers\Dashboard\NilaiBobotController;
use App\Http\Controllers\Dashboard\ProfileUserController;
use App\Http\Controllers\Dashboard\SubkriteriaController;
use App\Http\Controllers\Dashboard\NilaiUtilityController;

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

// Halaman Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Halaman Registrasi
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Halaman Home Page
Route::get('/', [HomeController::class, 'index'])->name('homepage.index');
Route::get('/rangking_home', [HomeController::class, 'rangking_home'])->name('rangking_home.index');

// Halaman Setelah Login atau Dashboard
Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/petunjuk', [DashboardController::class, 'petunjuk'])->name('petunjuk');

    // Kriteria
    Route::resource('/kriteria', KriteriaController::class);
    // Subkriteria
    Route::resource('/subkriteria', SubkriteriaController::class);
    //Alternatif
    Route::resource('/alternatif', AlternatifController::class);

    //Nilai Bobot
    Route::get('/nilai-bobot', [NilaiBobotController::class, 'index'])->name('nilai-bobot.index');
    Route::get('/nilai-bobot/create_all', [NilaiBobotController::class, 'create_all'])->name('nilai-bobot.create_all');
    Route::post('/nilai-bobot', [NilaiBobotController::class, 'store_all'])->name('nilai-bobot.store_all');
    Route::get('/nilai-bobot/create_single', [NilaiBobotController::class, 'create_single'])->name('nilai-bobot.create_single');
    Route::get('/nilai-bobot/{alternatif_id}/edit', [NilaiBobotController::class, 'edit'])->name('nilai-bobot.edit');
    Route::put('/nilai-bobot/{alternatif_id}', [NilaiBobotController::class, 'update'])->name('nilai-bobot.update');
    Route::delete('nilai-bobot/{alternatif_id}', [NilaiBobotController::class, 'destroy'])->name('nilai-bobot.destroy');

    // Nilai Utiliti
    Route::get('/nilaiutiliti', [NilaiUtilityController::class, 'index'])->name('nilaiutiliti');

    // Perhitungan SMART
    Route::get('/smart', [HasilSmartController::class, 'index'])->name('smart.index');
    // Hasil atau Prangkingan Metode SMART
    Route::get('/smart/hasil', [HasilSmartController::class, 'hasil'])->name('smart.hasil');

    // Data User atau Data Pengguna
    Route::resource('/user', UserController::class);
});

// User Profile atau Profile Pengguna
Route::middleware('auth')->group(function () {
    Route::get('/userprofile', [ProfileUserController::class, 'index'])->name('profile.index');
    Route::put('/userprofile/{id}', [ProfileUserController::class, 'update'])->name('profile.update');
    Route::post('/password', [ProfileUserController::class, 'password_action'])->name('password.action');
});
