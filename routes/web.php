<?php


use App\Http\Controllers\Pay\PayController;
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

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::prefix('purchase')->name('purchase.')->namespace("App\Http\Controllers\Purchase")->group(function () {
        Route::get('/create', CreateController::class)->name('create');
        Route::get('/', ListController::class)->name('list');
        Route::post('store', StoreController::class)->name('store');
        Route::post('store/pending/{pendingId}', StoreFromPendingController::class)->name('store-by-pending');
        Route::get('edit/{purchaseId}', EditController::class)->name('edit');
        Route::put('update/{purchaseId}', UpdateController::class)->name('update');
        Route::delete('delete/{purchaseId}', DeleteController::class)->name('delete');
    });


    Route::prefix('monthly')->name('monthly.')->namespace("App\Http\Controllers\MonthlyPurchase")->group(function () {
        Route::get('/', ListController::class)->name('list');
        Route::get('unserted', ListUnsertedController::class)->name('list-unserted');
        Route::get('create', CreateController::class)->name('create');
        Route::get('edit/{monthlyPurchaseId}', EditController::class)->name('edit');
        Route::post('store', StoreController::class)->name('store');
        Route::delete('delete/{monthlyPurchaseId}', DeleteController::class)->name('delete');
    });
    Route::prefix('pending')->name('pending.')->namespace("App\Http\Controllers\PendingMonthlyPurchases")->group(function () {
        Route::get('/', ListController::class)->name('list');
    });

    Route::prefix('month')->name('month.')->namespace("App\Http\Controllers\Month")->group(function () {
        Route::get('/', ListController::class)->name('list');
    });

    Route::get('/pay/{purchaseId}', PayController::class)->name('pay');

});
