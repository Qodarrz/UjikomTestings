<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\GaleryController;
use App\Http\Controllers\Admin\FotoController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Guest\HomeController;
use App\Http\Controllers\Guest\AuthController;

/*
|--------------------------------------------------------------------------
| ROUTE UNTUK ADMIN (PETUGAS)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {
    // 🔐 AUTH
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.post');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    // 🧱 HALAMAN ADMIN (setelah login)
    Route::middleware('auth:petugas')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // 📂 Kategori (CRUD)
        Route::resource('kategori', KategoriController::class)->except(['show']);

        // 🖼️ Galeri (CRUD)
        Route::resource('galeri', GaleryController::class)->except(['show']);

        // 📸 Foto (multi upload)
        Route::resource('foto', FotoController::class)->except(['show']);

        // 📰 Postingan (CRUD)
        Route::resource('posts', PostController::class)->except(['show']);

        // 🏫 Profil Sekolah (CRUD / single data)
        Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::put('profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    });
});


/*
|--------------------------------------------------------------------------
| ROUTE UNTUK GUEST (PENGUNJUNG)
|--------------------------------------------------------------------------
*/
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::controller(HomeController::class)->group(function () {
    // 🏠 Halaman utama
    Route::get('/', 'index')->name('guest.home');

    // 🏫 Profil sekolah
    Route::get('/profil', 'profile')->name('guest.profile');

    // 🖼️ Galeri kegiatan
    Route::get('/galeri', 'galeri')->name('guest.galeri');
    
    Route::get('/galeri/{slug}', 'galeriDetail')->name('guest.galeri.detail');

    // 📰 Berita / Informasi
    Route::get('/berita', 'posts')->name('guest.posts');

    // 📞 Kontak sekolah
    Route::get('/kontak', 'contact')->name('guest.contact');
});
