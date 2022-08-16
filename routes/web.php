<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PickupController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
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
    return redirect('/login');
});
Route::get('/login', function(){
    return view('login');
})->name('login');

Route::post('/postLogin', [LoginController::class,'postLogin'])->name('postLogin');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');


Route::group(['middleware'=> ['auth','AuthLevel:admin,pegawai']],function(){
    Route::get('/pickup/listpickup', [PickupController::class, 'listPickup']);
    route::get('/pickup/filterPickup',[PickupController::class, 'filterPickup'])->name('filterPickup');
    route::get('/pickup/outStandingPickup',[PickupController::class, 'outStandingPickup'])->name('outStandingPickup');
    Route::resource('pickup', PickupController::class);
    Route::get('pickup/export/today', [PickupController::class,'exportToday'])->name('exportToday');
    Route::get('pickup/export/all', [PickupController::class,'exportAll'])->name('exportAll');
    Route::get('pickup/export/cetak_pdf',[PickupController::class,'cetak_pdf'])->name('cetakPDF');
    Route::get('pickup/detail/{id}',[PickupController::class,'detailPickup']);
    Route::put('pickup/test/{id}', [PickupController::class,'test'])->name('test');
    Route::put('pickup/HoInStore/{id}', [PickupController::class,'HoInStore'])->name('HoInStore');
    Route::get('pickup/hoin/{id}',[PickupController::class,'HoIn'])->name('HoIn');
    Route::get('pickup/reportin/{id}',[PickupController::class,'ReportIn'])->name('ReportIn');
    Route::put('pickup/reportinstore/{id}', [PickupController::class,'ReportInStore'])->name('ReportInStore');
    Route::resource('customer', CustomerController::class);
    Route::resource('dashboard', DashboardController::class);
    Route::resource('user',UserController::class);
});
