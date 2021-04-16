<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DownloadFileController;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\RequirementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware view group. Now create something great!
|
*/

Route::middleware('checkLogin')->group(function (){

    Route::get('/','HomeController@index');

    Route::get('dashboard','DashBoardController@index')->name('dashboard');

    Route::get('requirement','RequirementController@index');

    Route::get('monitoring','MonitoringController@index');

    Route::get('requirement2','TaskController@index');

    Route::get('tasks/{id}',[TaskController::class,'index'])->name('task_detail');
    Route::post('tasksupdate/{id}',[TaskController::class,'postUpdate'])->name('task_update');

    Route::post('comment',[CommentController::class,'store']);

    Route::get('profile','DashBoardController@profile')->name('profile');
    Route::post('profile/{id}',[\App\Http\Controllers\UserProfileController::class,'update'])->name('profile_update');
    Route::get('logout',[\App\Http\Controllers\Auth\Login\AccountController::class,'logout']);
    Route::post('tasks',[\App\Http\Controllers\TaskController::class,'store']);
    Route::post('project',[\App\Http\Controllers\ProjectController::class,'store']);

    Route::get('get/{filename}', [DownloadFileController::class, 'getFile'])->name('download_file');
    Route::post('delete_file', [DownloadFileController::class, 'delete'])->name('delete_file');
});

Route::middleware(['checkLogin','checkAdminLogin'])->group(function (){

    Route::prefix('admin')->group(function (){

        Route::get('/',[\App\Http\Controllers\Admin\AdminController::class,'index'])->name('admin');
        Route::get('view/{id}',[\App\Http\Controllers\Admin\AdminController::class,'view'])->name('adminView');
        Route::view('create','admin.create')->name('adminCreate');
        Route::post('create',[AdminController::class,'create']);
        Route::get('update/{id}',[\App\Http\Controllers\Admin\AdminController::class,'update'])->name('adminUpdate');
        Route::post('update/{id}',[\App\Http\Controllers\Admin\AdminController::class,'updatePost'])->name('updatePost');
        Route::get('changestatus/{id}',[\App\Http\Controllers\Admin\AdminController::class,'changeActiveStatus'])->name('changestatus');

    });


});



Route::get('login',[\App\Http\Controllers\Auth\Login\AccountController::class,'index'])->name('login');
Route::post('login',[\App\Http\Controllers\Auth\Login\AccountController::class,'login']);
Route::post('logout',[\App\Http\Controllers\Auth\Login\AccountController::class,'logout']);



