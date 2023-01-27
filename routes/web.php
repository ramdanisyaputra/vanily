<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DoController;
use App\Http\Controllers\InvController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PoController;
use App\Http\Controllers\QtController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RfqController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!s
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('', [AdminController::class, 'index'])->name('index');
    Route::get('create', [AdminController::class, 'create'])->name('create');
    Route::post('store', [AdminController::class, 'store'])->name('store');
    Route::get('edit/{id}', [AdminController::class, 'edit'])->name('edit');
    Route::put('update', [AdminController::class, 'update'])->name('update');
    Route::get('delete/{id}', [AdminController::class, 'delete'])->name('delete');
});

Route::prefix('user')->name('user.')->group(function () {
    Route::get('', [UserController::class, 'index'])->name('index');
    Route::get('create', [UserController::class, 'create'])->name('create');
    Route::post('store', [UserController::class, 'store'])->name('store');
    Route::get('edit/{id}', [UserController::class, 'edit'])->name('edit');
    Route::put('update', [UserController::class, 'update'])->name('update');
    Route::get('delete/{id}', [UserController::class, 'delete'])->name('delete');
});

Route::prefix('client')->name('client.')->group(function () {
    Route::get('', [ClientController::class, 'index'])->name('index');
    Route::get('create', [ClientController::class, 'create'])->name('create');
    Route::post('store', [ClientController::class, 'store'])->name('store');
    Route::get('edit/{id}', [ClientController::class, 'edit'])->name('edit');
    Route::put('update', [ClientController::class, 'update'])->name('update');
    Route::get('delete/{id}', [ClientController::class, 'delete'])->name('delete');
});

Route::prefix('barang')->name('barang.')->group(function () {
    Route::get('', [BarangController::class, 'index'])->name('index');
    Route::get('create', [BarangController::class, 'create'])->name('create');
    Route::post('store', [BarangController::class, 'store'])->name('store');
    Route::get('edit/{id}', [BarangController::class, 'edit'])->name('edit');
    Route::put('update', [BarangController::class, 'update'])->name('update');
    Route::get('delete/{id}', [BarangController::class, 'delete'])->name('delete');
});

Route::prefix('akun')->name('akun.')->group(function () {
    Route::get('', [AkunController::class, 'index'])->name('index');
    Route::get('create', [AkunController::class, 'create'])->name('create');
    Route::post('store', [AkunController::class, 'store'])->name('store');
    Route::get('edit/{id}', [AkunController::class, 'edit'])->name('edit');
    Route::put('update', [AkunController::class, 'update'])->name('update');
    Route::get('delete/{id}', [AkunController::class, 'delete'])->name('delete');
});

Route::prefix('rfq')->name('rfq.')->group(function () {
    Route::get('', [RfqController::class, 'index'])->name('index');
    Route::get('create', [RfqController::class, 'create'])->name('create');
    Route::post('store', [RfqController::class, 'store'])->name('store');
    Route::get('delete/{id}', [RfqController::class, 'delete'])->name('delete');
    Route::get('view/{id}', [RfqController::class, 'view'])->name('view');

});

Route::prefix('sementara')->name('sementara.')->group(function () {
    Route::get('create', [RfqController::class, 'createSementara'])->name('create');
    Route::post('store', [RfqController::class, 'storeSementara'])->name('store');
    Route::get('edit/{id}', [RfqController::class, 'editSementara'])->name('edit');
    Route::put('update', [RfqController::class, 'updateSementara'])->name('update');
    Route::get('delete/{id}', [RfqController::class, 'deleteSementara'])->name('delete');
});

Route::prefix('qt')->name('qt.')->group(function () {
    Route::get('', [QtController::class, 'index'])->name('index');
    Route::get('create', [QtController::class, 'create'])->name('create');
    Route::get('input/{id}', [QtController::class, 'createInput'])->name('input');
    Route::post('store', [QtController::class, 'store'])->name('store');
    Route::get('delete/{id}', [QtController::class, 'delete'])->name('delete');
    Route::get('view/{id}', [QtController::class, 'view'])->name('view');
    Route::get('cetak/{id}', [QtController::class, 'cetak'])->name('cetak');
});

Route::prefix('po')->name('po.')->group(function () {
    Route::get('', [PoController::class, 'index'])->name('index');
    Route::get('create', [PoController::class, 'create'])->name('create');
    Route::get('input/{id}', [PoController::class, 'createInput'])->name('input');
    Route::post('store', [PoController::class, 'store'])->name('store');
    Route::get('delete/{id}', [PoController::class, 'delete'])->name('delete');
    Route::get('view/{id}', [PoController::class, 'view'])->name('view');
});

Route::prefix('inv')->name('inv.')->group(function () {
    Route::get('', [InvController::class, 'index'])->name('index');
    Route::get('create', [InvController::class, 'create'])->name('create');
    Route::get('input/{id}', [InvController::class, 'createInput'])->name('input');
    Route::post('store', [InvController::class, 'store'])->name('store');
    Route::get('delete/{id}', [InvController::class, 'delete'])->name('delete');
    Route::get('view/{id}', [InvController::class, 'view'])->name('view');
    Route::get('cetak/{id}', [InvController::class, 'cetak'])->name('cetak');
});

Route::prefix('payment')->name('payment.')->group(function () {
    Route::get('', [PaymentController::class, 'index'])->name('index');
    Route::get('create', [PaymentController::class, 'create'])->name('create');
    Route::get('input/{id}', [PaymentController::class, 'createInput'])->name('input');
    Route::post('store', [PaymentController::class, 'store'])->name('store');
    Route::get('delete/{id}', [PaymentController::class, 'delete'])->name('delete');
    Route::get('view/{id}', [PaymentController::class, 'view'])->name('view');
});

Route::prefix('do')->name('do.')->group(function () {
    Route::get('', [DoController::class, 'index'])->name('index');
    Route::get('create', [DoController::class, 'create'])->name('create');
    Route::get('input/{id}', [DoController::class, 'createInput'])->name('input');
    Route::post('store', [DoController::class, 'store'])->name('store');
    Route::get('delete/{id}', [DoController::class, 'delete'])->name('delete');
    Route::get('view/{id}', [DoController::class, 'view'])->name('view');
    Route::get('cetak/{id}', [DoController::class, 'cetak'])->name('cetak');
});

Route::prefix('jurnal')->name('jurnal.')->group(function () {
    Route::get('', [JurnalController::class, 'index'])->name('index');
    Route::get('create', [JurnalController::class, 'create'])->name('create');
    Route::post('store', [JurnalController::class, 'store'])->name('store');
    Route::post('ajax', [JurnalController::class, 'ajax'])->name('ajax');
    Route::get('view/{id}', [JurnalController::class, 'view'])->name('view');
    Route::get('cetak/{id}', [JurnalController::class, 'cetak'])->name('cetak');
});

Route::prefix('laporan')->name('laporan.')->group(function () {
    Route::get('', [LaporanController::class, 'index'])->name('index');
});

Route::prefix('report')->name('report.')->group(function () {
    Route::get('', [ReportController::class, 'index'])->name('index');
});
