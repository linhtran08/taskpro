<?php

use ArielMejiaDev\LarapexCharts\LarapexChart;
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

Route::middleware('checkLogin')->group(function (){

    Route::get('/','HomeController@index');

    Route::get('dashboard','DashBoardController@index')->name('dashboard');

    Route::get('requirement','RequirementController@index');

    Route::get('logout',[\App\Http\Controllers\Auth\Login\AccountController::class,'logout']);

});

Route::middleware(['checkLogin','checkAdminLogin'])->group(function (){

    Route::get('admin',[\App\Http\Controllers\Admin\AdminController::class,'index'])->name('admin');

    Route::get('admin/view/{id}',[\App\Http\Controllers\Admin\AdminController::class,'view'])->name('adminView');

});


Route::get('login',[\App\Http\Controllers\Auth\Login\AccountController::class,'index'])->name('login');
Route::post('login',[\App\Http\Controllers\Auth\Login\AccountController::class,'login']);
Route::post('logout',[\App\Http\Controllers\Auth\Login\AccountController::class,'logout']);



