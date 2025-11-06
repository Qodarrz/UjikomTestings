<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\GaleryController as AdminGaleryController;
use App\Http\Controllers\Admin\FotoController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Guest\HomeController;
use App\Http\Controllers\Guest\CommentController;
use App\Http\Controllers\Guest\LikeController;

use App\Http\Controllers\Guest\GaleryController;
use App\Http\Controllers\Guest\BeritaController;

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

    // 🧭 Default /admin route
    Route::get('/', function () {
        return auth('petugas')->check()
            ? redirect()->route('admin.dashboard')
            : redirect()->route('admin.login');
    });

    // 🧱 HALAMAN ADMIN (setelah login)
    Route::middleware('auth:petugas')->group(function () {

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // CRUD kategori, galeri, post
        Route::resource('kategori', KategoriController::class)->except(['show']);
        Route::resource('galeri', AdminGaleryController::class);
        Route::resource('posts', PostController::class)->except(['show']);

        // Foto CRUD
        Route::resource('foto', FotoController::class)->except(['index', 'show', 'create', 'store']);
        Route::get('galeri/{galeri}/foto/create', [FotoController::class, 'create'])->name('foto.create');
        Route::post('galeri/{galeri}/foto', [FotoController::class, 'store'])->name('foto.store');
        Route::get('foto/{foto}/edit', [FotoController::class, 'edit'])->name('foto.edit');
        Route::put('foto/{foto}', [FotoController::class, 'update'])->name('foto.update');
        Route::delete('foto/{foto}', [FotoController::class, 'destroy'])->name('foto.destroy');

        // Profile admin
        Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::put('profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    });
});


/*
|--------------------------------------------------------------------------
| ROUTE UNTUK GUEST (PENGUNJUNG)
|--------------------------------------------------------------------------
*/

// AUTH GUEST
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// HOME, PROFIL, KONTAK
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('guest.home');
    Route::get('/profil', 'profile')->name('guest.profile');
    Route::get('/kontak', 'contact')->name('guest.contact');
});

// GALERI
// Galeri
Route::get('/galeri', [GaleryController::class, 'index'])->name('guest.galeri.index');
Route::get('/galeri/{post}', [GaleryController::class, 'show'])->name('guest.galeri.show');
Route::post('/galeri/{post}/like', [LikeController::class, 'toggle'])
    ->middleware('auth:web')
    ->name('guest.galeri.like');

Route::post('/galeri/{post}/comment', [CommentController::class, 'store'])
    ->middleware('auth:web')
    ->name('guest.galeri.comment');

// Berita
Route::get('/berita', [BeritaController::class, 'index'])->name('guest.berita.index');
Route::get('/berita/{post}', [BeritaController::class, 'show'])->name('guest.berita.show');
Route::post('/berita/{post}/like', [BeritaController::class, 'like'])->name('guest.berita.like');
Route::post('/berita/{post}/comment', [BeritaController::class, 'comment'])->name('guest.berita.comment');
