<?php

use App\Http\Controllers\DeviceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dummyApiController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's

    Route::get('data', [dummyApiController::class, 'getData']);

//retreive one or all records
Route::get('list/{id?}', [DeviceController::class, 'list']);

//add record to 
Route::post('add',[DeviceController::class,'addRecord']);

//update record
Route::put('update',[DeviceController::class,'updateRecord']);

//search record
Route::get('search/{name}',[DeviceController::class,'searchRecord']);

//delete record
Route::delete('delete/{id}',[DeviceController::class,'deleteRecord']);

//save record with validation 
Route::post('save',[DeviceController::class,'save']);




    });


//sanctum token obtaining
Route::post("login",[UserController::class,'index']);


//upload
Route::post('upload',[UploadController::class,'upload']);




