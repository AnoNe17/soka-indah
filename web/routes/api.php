<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login', [ApiController::class, 'login']);
Route::post('profil', [ApiController::class, 'profil']);

// Route::post('tema', [ApiController::class, 'profil']);


Route::group(['prefix' => '/penilaian'], function () use ($router) {
    $router->get('/', [ApiController::class, 'mingguan']);
    // $router->post('/nilai', [ApiController::class, 'nilai']);
    $router->post('/semester', [ApiController::class, 'semester']);

    $router->post('/semester/nilai', [ApiController::class, 'nilaiSmt']);

    // $router->get('/lingkup', [ApiController::class, 'lingkup']);

    // $router->post('/tema', [ApiController::class, 'tema']);
    // $router->get('/create/id/{id_siswa}', [\App\Http\Controllers\PenilaianController::class, 'create']);
    // $router->get('/kd-indikator', [\App\Http\Controllers\PenilaianController::class, 'penilaianKdIndikator']);
});
