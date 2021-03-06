<?php

use App\Http\Controllers\DownloadFileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('message/{id}',function (Request $request,$id){
    $message = \Illuminate\Support\Facades\DB::table('task')
                ->where('assignee_id','=',$id)
                ->get();
    return response()->json($message);
});

Route::get('last/{id}',[\App\Http\Controllers\MonitoringController::class,'getJsonRelatedTask']);

Route::post('attachment',[DownloadFileController::class,'delete']);
Route::get('attachment/list/{id}',[\App\Http\Controllers\TaskController::class,'attachmentList']);

