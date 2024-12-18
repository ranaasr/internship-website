<?php

use App\Http\Controllers\Admin\SlipController;
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
Route::get('/', [SlipController::class, 'showDataForm'])->name('show.data.form');
Route::post('/data-pembayaran', [SlipController::class, 'showData'])->name('show.data');
Route::post('/dataPembayaran', [SlipController::class, 'showDataLink'])->name('show.data.link');
Route::get('/slip-pembayaran/{nim}', [SlipController::class, 'cetakSlip']);
Route::post('/Mutasi', [SlipController::class, 'showDataMutasi'])->name('show.data.mutasi');
Route::get('/surat/{nim}', [SlipController::class, 'cetakSurat']);
