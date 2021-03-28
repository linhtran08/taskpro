<?php

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware viewgroup. Now create something great!
|
*/

Route::middleware('checkLogin')->group(function (){

    Route::get('/','HomeController@index');

    Route::get('dashboard','DashBoardController@index')->name('dashboard');

    Route::get('requirement','RequirementController@index');
    Route::get('requirement2','TaskController@index');

    Route::get('logout',[\App\Http\Controllers\Auth\Login\AccountController::class,'logout']);
    Route::post('tasks',[\App\Http\Controllers\TaskController::class,'store']);
});

Route::middleware(['checkLogin','checkAdminLogin'])->group(function (){

    Route::prefix('admin')->group(function (){

        Route::get('/',[\App\Http\Controllers\Admin\AdminController::class,'index'])->name('admin');
        Route::get('view/{id}',[\App\Http\Controllers\Admin\AdminController::class,'view'])->name('adminView');
        Route::view('create','admin.create')->name('adminCreate');
        Route::post('create',[AdminController::class,'create']);
        Route::get('update/{id}',[\App\Http\Controllers\Admin\AdminController::class,'update'])->name('adminUpdate');
        Route::post('update/{id}',[\App\Http\Controllers\Admin\AdminController::class,'updatePost'])->name('updatePost');
    });


});



Route::get('login',[\App\Http\Controllers\Auth\Login\AccountController::class,'index'])->name('login');
Route::post('login',[\App\Http\Controllers\Auth\Login\AccountController::class,'login']);
Route::post('logout',[\App\Http\Controllers\Auth\Login\AccountController::class,'logout']);



