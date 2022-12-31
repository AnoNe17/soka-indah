<?php

use Illuminate\Support\Facades\Route;

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

$router->get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::group(['prefix' => '/main'], function () use ($router) {
    $router->get('/table', [\App\Http\Controllers\MainController::class, 'table']);
});

Route::group(['middleware' => 'auth'],  function () use ($router) {
    $router->get('/profile', [\App\Http\Controllers\HomeController::class, 'profile']);
    $router->post('/profile/store', [\App\Http\Controllers\HomeController::class, 'storeProfile']);

    Route::group(['prefix' => '/master'], function () use ($router) {
        Route::group(['prefix' => '/data-siswa'], function () use ($router) {
            $router->get('/', [\App\Http\Controllers\MasterController::class, 'listDataSiswa']);
            $router->get('/siswaexport', [\App\Http\Controllers\MasterController::class, 'siswaExport'])->name('siswaexport');
            $router->post('/siswaimport', [\App\Http\Controllers\MasterController::class, 'siswaImport'])->name('siswaimport');
            $router->get('/create', [\App\Http\Controllers\MasterController::class, 'createDataSiswa'])->name('create-data-siswa');
            $router->get('/edit/{id}', [\App\Http\Controllers\MasterController::class, 'editDataSiswa'])->name('edit-data-siswa');
            $router->post('/store', [\App\Http\Controllers\MasterController::class, 'storeDataSiswa']);
            $router->post('/store/{id}', [\App\Http\Controllers\MasterController::class, 'storeDataSiswa']);
            $router->get('/delete/{id}', [\App\Http\Controllers\MasterController::class, 'deleteDataSiswa']);
            $router->get('/create-password/{id}', [\App\Http\Controllers\MasterController::class, 'createPasswordDataSiswa']);
            $router->post('/create-password', [\App\Http\Controllers\MasterController::class, 'storePasswordDataSiswa']);
        });

        Route::group(['prefix' => '/data-pengguna'], function () use ($router) {
            $router->get('/', [\App\Http\Controllers\MasterController::class, 'listDataPengguna']);
            $router->get('/create', [\App\Http\Controllers\MasterController::class, 'createDataPengguna'])->name('create-data-pengguna');
            $router->get('/edit/{id}', [\App\Http\Controllers\MasterController::class, 'editDataPengguna'])->name('edit-data-pengguna');
            $router->post('/store', [\App\Http\Controllers\MasterController::class, 'storeDataPengguna']);
            $router->post('/store/{id}', [\App\Http\Controllers\MasterController::class, 'storeDataPengguna']);
            $router->get('/delete/{id}', [\App\Http\Controllers\MasterController::class, 'deleteDataPengguna']);
            $router->get('/create-password/{id}', [\App\Http\Controllers\MasterController::class, 'createPasswordDataPengguna']);
            $router->post('/create-password', [\App\Http\Controllers\MasterController::class, 'storePasswordDataPengguna']);
        });

        Route::group(['prefix' => '/data-kelompok'], function () use ($router) {
            $router->get('/', [\App\Http\Controllers\MasterController::class, 'listDataKelompok']);
            $router->get('/create', [\App\Http\Controllers\MasterController::class, 'createDataKelompok'])->name('create-data-kelompok');
            $router->get('/edit/{id}', [\App\Http\Controllers\MasterController::class, 'editDataKelompok'])->name('edit-data-kelompok');
            $router->post('/store', [\App\Http\Controllers\MasterController::class, 'storeDataKelompok']);
            $router->post('/store/{id}', [\App\Http\Controllers\MasterController::class, 'storeDataKelompok']);
            $router->get('/delete/{id}', [\App\Http\Controllers\MasterController::class, 'deleteDataKelompok']);
            $router->get('/pilih-siswa/{id}', [\App\Http\Controllers\MasterController::class, 'pilihSiswa']);
            $router->post('/store-pilih-siswa/{id}', [\App\Http\Controllers\MasterController::class, 'storePilihSiswa']);
            $router->get('/lihat-siswa/{id}', [\App\Http\Controllers\MasterController::class, 'lihatSiswa']);
            $router->post('/store-lihat-siswa/{id}', [\App\Http\Controllers\MasterController::class, 'storeLihatSiswa']);
        });

        Route::group(['prefix' => '/data-kd'], function () use ($router) {
            $router->get('/', [\App\Http\Controllers\MasterController::class, 'listDataKdIndikator']);
            $router->get('/create', [\App\Http\Controllers\MasterController::class, 'createDataKdIndikator']);
            $router->get('/indikator/{id}', [\App\Http\Controllers\MasterController::class, 'createIndikator']);
            $router->post('/store', [\App\Http\Controllers\MasterController::class, 'storeDataKdIndikator']);
            $router->post('/store/{id}', [\App\Http\Controllers\MasterController::class, 'storeDataKdIndikator']);
            $router->post('/store-indikator', [\App\Http\Controllers\MasterController::class, 'storeIndikator']);
            $router->post('/store-indikator/{id}', [\App\Http\Controllers\MasterController::class, 'storeIndikator']);
        });
    });

    Route::group(['prefix' => '/perkembangan'], function () use ($router) {
        Route::group(['prefix' => '/pendidikan-karakter'], function () use ($router) {
            $router->get('/', [\App\Http\Controllers\PerkembanganController::class, 'index']);
            $router->post('/store', [\App\Http\Controllers\PerkembanganController::class, 'store']);
        });
        Route::group(['prefix' => '/evaluasi-tumbuh-kembang'], function () use ($router) {
            $router->get('/', [\App\Http\Controllers\PerkembanganController::class, 'indexEvaluasi']);
            $router->post('/store', [\App\Http\Controllers\PerkembanganController::class, 'storeEvaluasiTumbuhKembang']);
        });
        Route::group(['prefix' => '/pertumbuhan-absensi'], function () use ($router) {
            $router->get('/', [\App\Http\Controllers\PerkembanganController::class, 'indexPertumbuhanAbsensi']);
            $router->post('/store', [\App\Http\Controllers\PerkembanganController::class, 'storePertumbuhanAbsensi']);
        });
    });

    Route::group(['prefix' => '/penilaian'], function () use ($router) {
        $router->get('/', [\App\Http\Controllers\PenilaianController::class, 'index']);
        $router->get('/create/id/{id_siswa}', [\App\Http\Controllers\PenilaianController::class, 'create']);
        $router->get('/kd-indikator', [\App\Http\Controllers\PenilaianController::class, 'penilaianKdIndikator']);
        $router->get('/kd-indikator/create/id/{id_lingkup}', [\App\Http\Controllers\PenilaianController::class, 'penilaianKdIndikatorCreate']);
        $router->get('/kd-indikator/edit/id/{id_penilaian}', [\App\Http\Controllers\PenilaianController::class, 'penilaianKdIndikatorEdit']);
        $router->post('/store', [\App\Http\Controllers\PenilaianController::class, 'store']);
        $router->post('/store-indikator', [\App\Http\Controllers\PenilaianController::class, 'storePenilaianIndikator']);
        $router->post('/store-indikator/{id}', [\App\Http\Controllers\PenilaianController::class, 'storePenilaianIndikator']);
    });
    Route::group(['prefix' => '/laporan'], function () use ($router) {
        $router->get('/', [\App\Http\Controllers\LaporanController::class, 'index']);
        $router->post('/store', [\App\Http\Controllers\LaporanController::class, 'store']);
        $router->get('/detail-laporan', [\App\Http\Controllers\LaporanController::class, 'detailLaporan']);
        $router->post('/store-detail-laporan', [\App\Http\Controllers\LaporanController::class, 'storeDetailLaporan']);
        $router->post('/store-detail-laporan/{id}', [\App\Http\Controllers\LaporanController::class, 'storeDetailLaporan']);
    });
    Route::group(['prefix' => '/pengaturan'], function () use ($router) {
        $router->get('/tahun-ajaran', [\App\Http\Controllers\HomeController::class, 'formTahunAjaran']);
        $router->post('/tahun-ajaran/store', [\App\Http\Controllers\HomeController::class, 'storeTahunAjaran']);
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
