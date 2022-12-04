<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\PembelianController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/add', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::post('/admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::post('/admin/delete/{id}', [AdminController::class, 'delete'])->name('admin.delete');
    Route::get('/motor', [MotorController::class, 'index'])->name('motor.index');
    Route::get('/motor/add', [MotorController::class, 'create'])->name('motor.create');
    Route::post('/motor/store', [MotorController::class, 'store'])->name('motor.store');
    Route::get('/motor/edit/{id}', [MotorController::class, 'edit'])->name('motor.edit');
    Route::post('/motor/update/{id}', [MotorController::class, 'update'])->name('motor.update');
    Route::post('/motor/delete/{id}', [MotorController::class, 'delete'])->name('motor.delete');
    Route::post('/motor/softdelete/{id}', [MotorController::class, 'softdelete'])->name('motor.softdelete');
    Route::get('/motor/restore/{id}', [MotorController::class, 'restore'])->name('motor.restore');
    Route::get('/pembelian', [PembelianController::class, 'index'])->name('pembelian.index');
    Route::get('/pembelian/add', [PembelianController::class, 'create'])->name('pembelian.create');
    Route::post('/pembelian/store', [PembelianController::class, 'store'])->name('pembelian.store');
    Route::get('/pembelian/edit/{id}', [PembelianController::class, 'edit'])->name('pembelian.edit');
    Route::post('/pembelian/update/{id}', [PembelianController::class, 'update'])->name('pembelian.update');
    Route::post('/pembelian/delete/{id}', [PembelianController::class, 'delete'])->name('pembelian.delete');
});
