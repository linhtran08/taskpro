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

//Route::get('{all}',function (){
//    return view('login.login');
//})->where('all','.*');


Route::get('/', function () {


    $chart = (new LarapexChart)->lineChart()
        ->setTitle('Sales during 2021.')
        ->setSubtitle('Physical sales vs Digital sales.')
        ->addData('Physical sales', [40, 93, 35, 42, 18, 82,0,0,0,0,0,0])
        ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr','May', 'Jun', 'Jul', 'Aug', 'Sep','Oct', 'Nov', 'Dec']);
    return view('welcome', compact('chart'));
});

//Route::get('requirement',function (){
//    return view('test');
//});

Route::get('requirement','RequirementController@index');

Route::get('login',function(){
    return view('login.login');
});

Route::get('dashboard','DashBoardController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
