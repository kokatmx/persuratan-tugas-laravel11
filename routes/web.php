<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SuratController;

Route::get('/', function () {
    return view('home');
});

// Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';

// user routes
Route::middleware(['auth', 'userMiddleware'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
});

// admin routes
Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/dashboard/mahasiswa', [AdminController::class, 'mahasiswa'])->name('admin.dashboard.mahasiswa');
    Route::get('/admin/dashboard/arsip/index', [AdminController::class, 'arsipadmin'])->name('admin.dashboard.arsip.index');
    Route::get('/admin/dashboard/suratmasuk/index', [AdminController::class, 'suratmasukadmin'])->name('admin.dashboard.suratmasuk.index');
    Route::get('/admin/dashboard/suratkeluar/index', [AdminController::class, 'suratkeluaradmin'])->name('admin.dashboard.suratkeluar.index');
    Route::get('/admin/dashboard/analisis/index', [AdminController::class, 'analisisadmin'])->name('admin.dashboard.analisis.index');
    Route::post('/mahasiswa/tambah', [MahasiswaController::class, 'store']);
});

//arsip surat
Route::middleware(['auth', 'adminMiddleware'])->group(
    function () {
        Route::get('admin/dashboard/arsip/suratizin/index', [ArsipController::class, 'suratizin'])->name('admin.dashboard.arsip.suratizin.index');
        Route::get('admin/dashboard/arsip/suratsakit/index', [ArsipController::class, 'suratsakit'])->name('admin.dashboard.arsip.suratsakit.index');
        Route::get('admin/dashboard/arsip/suratdisposisi/index', [ArsipController::class, 'suratdisposisi'])->name('admin.dashboard.arsip.suratdisposisi.index');
        Route::post("/suratsakit/tambah", [ArsipController::class, 'tambahsuratsakit']);
        Route::post("/suratizin/tambah", [ArsipController::class, 'tambahsuratizin']);
        Route::post("/suratdisposisi/tambah", [ArsipController::class, 'tambahsuratdisposisi']);
    }
);

// contact
Route::get('/contact', function () {
    return view('contact');
});

// surat2
// Route::get('/users', [UserController::class, 'loadAllSurat']);
// Route::get('/add/surat', [UserController::class, 'loadAddSurat']);

// Route::post('/add/surat', [UserController::class, 'AddSurat'])->name('AddSurat');

// Route::get('/edit/{id}', [UserController::class, 'loadEditForm']);
// Route::get('/delete/{id}', [UserController::class, 'deleteSurat']);

// Route::post('/edit/surat', [UserController::class, 'EditSurat'])->name('EditSurat');


// tambahan ku
// Route::resource('surats', SuratController::class);
Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    Route::get('/surat/{id}', [ArsipController::class, 'show'])->name('surats.show');
    Route::post('/surats/create', [ArsipController::class, 'createSurat'])->name('surats.create');
    Route::put('/surats/{id}/update', [ArsipController::class, 'updateSurat'])->name('surats.update');
    Route::delete('/surats/{id}/delete', [ArsipController::class, 'deleteSurat'])->name('surats.delete');
});
