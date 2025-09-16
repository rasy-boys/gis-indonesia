<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\AktivitasController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\PublikasiController;
use App\Http\Controllers\KontakController;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\HomeAdminController;
use App\Http\Controllers\Admin\LingkupController;
use App\Http\Controllers\Admin\RuangLingkupController;
use App\Http\Controllers\Admin\LatarBelakangController;
use App\Http\Controllers\Admin\VisiMisiController;
use App\Http\Controllers\Admin\PeraturanController;
use App\Http\Controllers\Admin\JurnalController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\Admin\TestimonialsController;
use App\Http\Controllers\Admin\LogoController;
use App\Http\Controllers\Admin\GaleriFotoController;
use App\Http\Controllers\Admin\UsersController;



Route::get('/', [HomeController::class, 'index']);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('pamflets', \App\Http\Controllers\Admin\PamfletController::class);
});


Route::get('/team', [TeamController::class, 'index'])->name('team');

Route::get('/profil/latar-belakang', [ProfilController::class, 'latarBelakang'])->name('profil.latar-belakang');

Route::get('/profil/visi-misi', [ProfilController::class, 'visiMisi'])->name('profil.visi-misi');

Route::get('/profil/struktur', [ProfilController::class, 'struktur'])->name('profil.struktur');
Route::get('/team/{slug}', [TeamController::class, 'showBySlug'])->name('team.show');
Route::post('/kontak', [KontakController::class, 'send'])->name('contact.send');

Route::get('/aktivitas', [AktivitasController::class, 'index'])->name('aktivitas.index');

Route::get('/info/berita', [InfoController::class, 'berita'])->name('info.berita');
Route::get('/info/berita/{slug}', [InfoController::class, 'detail'])->name('info.berita.detail');
Route::get('/info/berita/kategori/{nama}', [InfoController::class, 'kategori'])
    ->name('info.berita.kategori');

    Route::get('/info/berita/arsip/{year}', [InfoController::class, 'arsip'])->name('info.berita.archive');

// Route::get('/info/berita/{slug}', [HomeController::class, 'detail'])->name('info.berita.detail');


Route::get('/info/faq', [InfoController::class, 'faq'])->name('info.faq');

Route::get('/info/seminar', [InfoController::class, 'seminar'])->name('info.seminar');

Route::get('/info/kerjasama', [InfoController::class, 'kerjasama'])->name('info.kerjasama');

Route::get('/info/pelatihan_dan_perdampingan', [InfoController::class, 'pelatihan_dan_perdampingan'])->name('info.pelatihan_dan_perdampingan');
Route::get('/info/pelatihan_dan_advokasi', [InfoController::class, 'pelatihan_dan_advokasi'])->name('info.pelatihan_dan_advokasi');

Route::get('/galeri/foto', [GaleriController::class, 'foto'])->name('galeri.foto');

Route::get('/publikasi/peraturan', [PublikasiController::class, 'peraturan'])->name('publikasi.peraturan');

Route::get('/publikasi/hasilpenelitian', [PublikasiController::class, 'hasilpenelitian'])->name('publikasi.hasilpenelitian');

Route::get('/publikasi/jurnal', [PublikasiController::class, 'jurnal'])->name('publikasi.jurnal');
Route::get('/publikasi/jurnal/{slug}', [PublikasiController::class, 'detail'])->name('publikasi.detail-jurnal');

Route::get('/publikasi/jurnal/arsip/{year}', [PublikasiController::class, 'arsip'])->name('publikasi.jurnal.archive');
Route::get('/galeri/album/{id}', [GaleriController::class, 'showAlbum'])->name('galeri.album-show');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');

Route::get('/pamflet/{id}', [InfoController::class, 'showPamflet'])->name('pamflet.show');


// Route::get('/', function () {
//     return view('welcome');
// });
Route::prefix('admin')->as('admin.')->middleware(['auth'])->group(function () {
    Route::resource('logo', LogoController::class);
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('testimonials', TestimonialsController::class);
     // CRUD Tag
     Route::resource('tags', TagController::class);
});

Route::get('/berita/tag/{tag}', [InfoController::class, 'filterByTag'])->name('info.berita.tag');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', IsAdmin::class])
    ->prefix('admin')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    });

    Route::middleware(['auth', \App\Http\Middleware\IsAdmin::class])
    ->prefix('admin')
    ->group(function () {
        // Route::get('/beranda/edit', [HomeAdminController::class, 'edit'])->name('admin.beranda.edit');
        Route::post('/beranda/update', [HomeAdminController::class, 'update'])->name('admin.beranda.update');
        Route::post('/beranda/lingkup', [LingkupController::class, 'store'])->name('lingkup.store');
        Route::delete('/beranda/lingkup/{id}', [LingkupController::class, 'destroy'])->name('lingkup.destroy');
    });

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('home', HomeAdminController::class);
    });

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('kategori', App\Http\Controllers\Admin\KategoriBeritaController::class);
        Route::resource('faq', App\Http\Controllers\Admin\FaqController::class);
        Route::resource('albums', App\Http\Controllers\Admin\AlbumController::class);
    });
  
    
Route::middleware(['auth', \App\Http\Middleware\IsAdmin::class])
->prefix('admin')
->group(function () {
    Route::get('/ruang-lingkup', [RuangLingkupController::class, 'index'])->name('admin.ruang-lingkup.index');
    Route::get('/ruang-lingkup/create', [RuangLingkupController::class, 'create'])->name('admin.ruang-lingkup.create');
    Route::post('/ruang-lingkup', [RuangLingkupController::class, 'store'])->name('admin.ruang-lingkup.store');
    Route::get('/ruang-lingkup/{id}/edit', [RuangLingkupController::class, 'edit'])->name('admin.ruang-lingkup.edit');
    Route::put('/ruang-lingkup/{id}', [RuangLingkupController::class, 'update'])->name('admin.ruang-lingkup.update');
    Route::delete('/ruang-lingkup/{id}', [RuangLingkupController::class, 'destroy'])->name('admin.ruang-lingkup.destroy');
    
    Route::get('/latar-belakang/edit', [LatarBelakangController::class, 'edit'])->name('admin.latar-belakang.edit');
      
    Route::get('/galeri/album/{album}', [GaleriFotoController::class, 'showAlbum'])->name('admin.galeri.album.show');

Route::post('/latar-belakang/update', [LatarBelakangController::class, 'update'])->name('admin.latar-belakang.update');
Route::get('/visi-misi/edit', [VisiMisiController::class, 'edit'])->name('admin.visi-misi.edit');
Route::post('/visi-misi/update', [VisiMisiController::class, 'update'])->name('admin.visi-misi.update');

Route::get('/berita', [BeritaController::class, 'index'])->name('admin.berita.index');
Route::get('/berita/create', [BeritaController::class, 'create'])->name('admin.berita.create');
Route::post('/berita', [BeritaController::class, 'store'])->name('admin.berita.store');
Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('admin.berita.edit');
Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('admin.berita.update');
Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('admin.berita.destroy');
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('galeri', \App\Http\Controllers\Admin\GaleriFotoController::class);
});


// routes/web.php
Route::prefix('admin/peraturan')->name('admin.peraturan.')->middleware('auth')->group(function () {
    Route::get('/', [PeraturanController::class, 'index'])->name('index');
    Route::get('/create', [PeraturanController::class, 'create'])->name('create');
    Route::post('/', [PeraturanController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [PeraturanController::class, 'edit'])->name('edit');
    Route::put('/{id}', [PeraturanController::class, 'update'])->name('update');
    Route::delete('/{id}', [PeraturanController::class, 'destroy'])->name('destroy');
});

Route::prefix('admin/jurnal')->name('admin.jurnal.')->group(function () {
    Route::get('/', [JurnalController::class, 'index'])->name('index');
    Route::get('/create', [JurnalController::class, 'create'])->name('create');
    Route::post('/store', [JurnalController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [JurnalController::class, 'edit'])->name('edit');
    Route::put('/{id}', [JurnalController::class, 'update'])->name('update');
    Route::delete('/{id}', [JurnalController::class, 'destroy'])->name('destroy');
});


Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::resource('teams', \App\Http\Controllers\Admin\TeamController::class);

    // Tambahan route untuk hapus foto
    Route::delete('teams/{team}/delete-photo', [\App\Http\Controllers\Admin\TeamController::class, 'deletePhoto'])
        ->name('teams.deletePhoto');
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UsersController::class);
});

require __DIR__.'/auth.php';
