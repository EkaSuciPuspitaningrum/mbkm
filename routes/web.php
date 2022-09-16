<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaMBKMController;
use App\Http\Controllers\LogBookController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return redirect()->to('/mbkm');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/mbkm', [MahasiswaMBKMController::class, 'render_dashboard'])->name('mbkm.dashboard');
    Route::get('/mbkm/daftar', [MahasiswaMBKMController::class, 'render_form'])->name('mbkm.daftar');
    Route::post('/mbkm/daftar', [MahasiswaMBKMController::class, 'store'])->name('mbkm.store');
    Route::post('/mbkm/approve', [MahasiswaMBKMController::class, 'approve'])->name('mbkm.approve');
    Route::post('/mbkm/create_pembimbing', [MahasiswaMBKMController::class, 'create_pembimbing'])->name('mbkm.create_pembimbing');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/logbook', [LogBookController::class, 'render'])->name('logbook.render');
    Route::get('/logbook/form', [LogBookController::class, 'render_form'])->name('logbook.form');
    Route::post('/logbook/form', [LogBookController::class, 'store'])->name('logbook.form');
    Route::get('/logbook/data', [LogBookController::class, 'data'])->name('logbook.data');
    Route::get('/logbook/noreg/{id}', [LogBookController::class, 'render_noreg'])->name('logbook.noreg');
});

Route::get('/mbkm/noreg/{id}', [MahasiswaMBKMController::class, 'render_noreg'])->name('mbkm.noreg');


require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
