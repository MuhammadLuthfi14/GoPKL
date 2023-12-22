<?php

// use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticatedController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PembimbingController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\PersyaratanController;
use App\Http\Middleware\CheckDataCreate;
use Illuminate\Support\Facades\Route;

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
    return view('pages.dashboard');
})->middleware(['auth', 'verified']);

Route::get('/select-role', function () {
    return view('auth.select-role');
})->middleware(CheckDataCreate::class);

Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/persyaratan-pkl', function () {
    return view('pages.persyaratan-pkl');
})->middleware(['auth', 'verified'])->name('persyaratan-pkl');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create')->middleware(CheckDataCreate::class);
    Route::get('/guru/create', [GuruController::class, 'create'])->name('guru.create')->middleware(CheckDataCreate::class);
    Route::get('/perusahaan/create', [PerusahaanController::class, 'create'])->name('perusahaan.create')->middleware(CheckDataCreate::class);
    Route::post('/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
    Route::post('/guru/store', [GuruController::class, 'store'])->name('guru.store');
    Route::post('/perusahaan/store', [PerusahaanController::class, 'store'])->name('perusahaan.store');
});

require __DIR__ . '/auth.php';


// siswa
Route::group(['middleware' => ['auth', 'role:siswa']], function () {
    Route::get('/siswa/pendaftaran-pkl', [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('/siswa/hasil-pendaftaran', [SiswaController::class, 'index_hasil_pendaftaran_siswa'])->name('siswa.hasil-pendaftaran');
    Route::get('/siswa/{id}/show', [SiswaController::class, 'show'])->name('siswa.show');
    Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::patch('/siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/destroy/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
});


//guru
Route::group(['middleware' => ['auth', 'role:guru']], function () {
    Route::get('/guru/pendaftaran-pkl', [GuruController::class, 'index'])->name('guru.index');
    Route::get('/guru/hasil-pendaftaran', [GuruController::class, 'index_hasil_pendaftaran_guru'])->name('guru.hasil-pendaftaran');
    Route::get('/guru/{id}/show', [GuruController::class, 'show'])->name('guru.show');
    Route::get('/guru/{id}/edit', [GuruController::class, 'edit'])->name('guru.edit');
    Route::patch('/guru/{id}', [GuruController::class, 'update'])->name('guru.update');
    Route::delete('/guru/destroy/{id}', [GuruController::class, 'destroy'])->name('guru.destroy');
});


//perusahaan
Route::group(['middleware' => ['auth', 'role:perusahaan']], function () {
    Route::get('/perusahaan/pendaftaran-pkl', [PerusahaanController::class, 'index'])->name('perusahaan.index');
    Route::get('/perusahaan/hasil-pendaftaran', [PerusahaanController::class, 'index_hasil_pendaftaran_perusahaan'])->name('perusahaan.hasil-pendaftaran');
    Route::post('/perusahaan/terima-siswa', [PerusahaanController::class, 'terimaSiswa'])->name('perusahaan.terima-siswa');
    Route::post('/perusahaan/tolak-siswa', [PerusahaanController::class, 'tolakSiswa'])->name('perusahaan.tolak-siswa');
    Route::delete('/perusahaan/hapus-siswa/{id}', [PerusahaanController::class, 'hapusSiswa'])->name('perusahaan.hapus-siswa');
    Route::get('/perusahaan/{id}/show', [PerusahaanController::class, 'show'])->name('perusahaan.show');
    Route::get('/perusahaan/{id}/edit', [PerusahaanController::class, 'edit'])->name('perusahaan.edit');
    Route::patch('/perusahaan/{id}', [PerusahaanController::class, 'update'])->name('perusahaan.update');
    Route::delete('/perusahaan/destroy/{id}', [PerusahaanController::class, 'destroy'])->name('perusahaan.destroy');
});


//admin
Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/VerifSiswa', [AdminController::class, 'index_VerifSiswa'])->name('VerifSiswa');
    Route::get('/VerifGuru', [AdminController::class, 'index_VerifGuru'])->name('VerifGuru');
    Route::get('/VerifPerusahaan', [AdminController::class, 'index_VerifPerusahaan'])->name('VerifPerusahaan');
    Route::get('/siswa', [AdminController::class, 'index_siswa'])->name('siswa');
    Route::get('/guru', [AdminController::class, 'index_guru'])->name('guru');
    Route::get('/perusahaan', [AdminController::class, 'index_perusahaan'])->name('perusahaan');
    Route::get('/pembimbing', [AdminController::class, 'index_pembimbing'])->name('pembimbing');
    Route::post('/daftarpembimbing', [AdminController::class, 'daftarpembimbing'])->name('daftarpembimbing');
    Route::post('/terimasiswa', [AdminController::class, 'terimasiswa'])->name('terimasiswa');
    Route::post('/terimaguru', [AdminController::class, 'terimaguru'])->name('terimaguru');
    Route::post('/terimaperusahaan', [AdminController::class, 'terimaperusahaan'])->name('terimaperusahaan');
    Route::patch('/updatesiswa/{id}', [AdminController::class, 'updatesiswa'])->name('updatesiswa');
    Route::patch('/updateguru/{id}', [AdminController::class, 'updateguru'])->name('updateguru');
    Route::patch('/updateperusahaan/{id}', [AdminController::class, 'updateperusahaan'])->name('updateperusahaan');
    Route::delete('/hapussiswa', [AdminController::class, 'hapussiswa'])->name('hapussiswa');
    Route::delete('/hapusguru', [AdminController::class, 'hapusguru'])->name('hapusguru');
    Route::delete('/hapusperusahaan', [AdminController::class, 'hapusperusahaan'])->name('hapusperusahaan');
});


//permohonan
Route::group(['middleware' => ['auth', 'checkrole:siswa,guru,perusahaan,admin']], function () {
    Route::post('/permohonan/store', [PermohonanController::class, 'store'])->name('permohonan.store');
    // Route::patch('/permohonan/{id}', [PermohonanController::class, 'update'])->name('permohonan.update');
});


//pembimbing
Route::group(['middleware' => ['auth', 'role:guru']], function () {
    Route::post('/pembimbing/store', [PembimbingController::class, 'store'])->name('pembimbing.store');
    Route::post('/terima-siswa/{id}', [PembimbingController::class, 'terimaSiswa'])->name('terima-siswa');
    Route::delete('/tolak-siswa/{id}', [PembimbingController::class, 'tolakSiswa'])->name('tolak-siswa');
    Route::delete('/hapus-siswa/{id}', [PembimbingController::class, 'hapusSiswa'])->name('hapus-siswa');
});


//persyaratan
Route::group(['middleware' => ['auth']], function () {
    Route::get('/persyaratan/index', [PersyaratanController::class, 'index'])->name('persyaratan.index');
});


//pdf
Route::group(['middleware' => ['auth']], function () {
    Route::get('/pembimbing-pdf', [PDFController::class, 'pembimbing'])->middleware('checkrole:perusahaan')->name('pembimbing-pdf');
    Route::get('/penerimaan-pdf', [PDFController::class, 'penerimaan'])->middleware('checkrole:admin')->name('penerimaan-pdf');
});

Route::get('/authenticated', [AuthenticatedController::class, 'index'])->name('authenticated')->middleware('auth');