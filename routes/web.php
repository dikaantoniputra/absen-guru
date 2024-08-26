<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AbsenMasukController;
use App\Http\Controllers\AbsenPulangController;
use App\Http\Controllers\GuruSekolahController;
use App\Http\Controllers\KepalaSekolahController;
use App\Http\Controllers\YayasanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {

    // Rute umum untuk admin dan freelancer
    Route::group(['prefix' => 'admin', 'middleware' => 'role:admin'], function () {
        Route::get('/', function () {
            return view('page.index');
        })->name('admin.dashboard');
        Route::resource('user', UserController::class);
        Route::resource('absenmasuk', AbsenMasukController::class);
        Route::resource('absenpulang', AbsenPulangController::class);

        Route::get('absen-harian-tk', [YayasanController::class, 'hariantk'])->name('admin.tk.harian');
        Route::get('absen-harian-sd', [YayasanController::class, 'hariansd'])->name('admin.sd.harian');
        Route::get('absen-harian-smp', [YayasanController::class, 'hariansmp'])->name('admin.smp.harian');
        Route::get('absen-harian-sma', [YayasanController::class, 'hariansma'])->name('admin.sma.harian');
       

        Route::get('laporan-unit-tk', [YayasanController::class, 'laporantk'])->name('laporan.tk.admin');
        Route::get('laporan-unit-sd', [YayasanController::class, 'laporansd'])->name('laporan.sd.admin');
        Route::get('laporan-unit-smp', [YayasanController::class, 'laporansmp'])->name('laporan.smp.admin');
        Route::get('laporan-unit-sma', [YayasanController::class, 'laporansma'])->name('laporan.sma.admin');

    });

    Route::group(['prefix' => 'yayasan', 'middleware' => 'role:yayasan'], function () {
      
        Route::get('/', [YayasanController::class, 'index'])->name('yayasan.dashboard');
        Route::get('laporan-karyawan', [YayasanController::class, 'karyawan'])->name('laporan.karyawan.yayasan');
        Route::get('absen-harian-tk', [YayasanController::class, 'hariantk'])->name('data.tk.harian');
        Route::get('absen-harian-sd', [YayasanController::class, 'hariansd'])->name('data.sd.harian');
        Route::get('absen-harian-smp', [YayasanController::class, 'hariansmp'])->name('data.smp.harian');
        Route::get('absen-harian-sma', [YayasanController::class, 'hariansma'])->name('data.sma.harian');

        Route::get('laporan-unit-tk', [YayasanController::class, 'laporantk'])->name('laporan.tk.yayasan');
        Route::get('laporan-unit-sd', [YayasanController::class, 'laporansd'])->name('laporan.sd.yayasan');
        Route::get('laporan-unit-smp', [YayasanController::class, 'laporansmp'])->name('laporan.smp.yayasan');
        Route::get('laporan-unit-sma', [YayasanController::class, 'laporansma'])->name('laporan.sma.yayasan');
       
    });

         Route::group(['prefix' => 'kepala-sekolah', 'middleware' => 'role:kepala-sekolah'], function () {
        Route::get('/', function () {
            return view('page.index');
        })->name('kepala.unit');
       
        Route::get('/absen-masuk-kepala-sekolah', [KepalaSekolahController::class, 'absen'])->name('absen.kepsek');
        Route::get('/absen-pulang-kepala-sekolah', [KepalaSekolahController::class, 'pulang'])->name('absen.kepsek.pulang');
        Route::post('/absenmasukkepsek', [KepalaSekolahController::class, 'store'])->name('absenmasukkepsek');
        Route::post('/absenpulangkepsek', [KepalaSekolahController::class, 'absenpulang'])->name('absenpulangkepsek');
        Route::get('/data-karyawan', [KepalaSekolahController::class, 'karyawan'])->name('data.karyawan.unit');
        Route::get('/data-karyawan-masuk', [KepalaSekolahController::class, 'masukkaryawan'])->name('masuk.karyawan');
        Route::get('/data-karyawan-pulang', [KepalaSekolahController::class, 'pulangkaryawan'])->name('pulang.karyawan');

        Route::get('/data-kepsek-masuk', [KepalaSekolahController::class, 'masukkepsek'])->name('masuk.kepsek');
        Route::get('/data-kepsek-pulang', [KepalaSekolahController::class, 'pulangkepsek'])->name('pulang.kepsek');
        
    });

    Route::group(['prefix' => 'karyawan', 'middleware' => 'role:guru'], function () {
        Route::get('/', function () {
            return view('page.index');
        })->name('guru.dashboard');
        Route::get('/absen-masuk-karyawan-sekolah', [GuruSekolahController::class, 'absen'])->name('absen.guru');
        Route::get('/absen-pulang-karyawan-sekolah', [GuruSekolahController::class, 'pulang'])->name('absen.guru.pulang');
        Route::post('/absenmasukguru', [GuruSekolahController::class, 'store'])->name('absenmasukguru');
        Route::post('/absenpulangguru', [GuruSekolahController::class, 'absenpulang'])->name('absenpulangguru');
        Route::get('/karyawan-masuk', [GuruSekolahController::class, 'masukkaryawan'])->name('karyawan.masuk');
        Route::get('karyawan-pulang', [GuruSekolahController::class, 'pulangkaryawan'])->name('karyawan.pulang');
    });


});

