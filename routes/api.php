<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CatogryController;
use App\Http\Controllers\Api\JobController;
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

// Auth controller 
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
// end Auth Controller

//start catogry controller
Route::get('/catogrys',[CatogryController::class,'index']);
Route::get('/catogry/{id}/jobs',[CatogryController::class,'show']);
//end catogry controller

//satart job controller
Route::get('/jobs',[JobController::class,'index']);
Route::get('/job/{id}',[JobController::class,'show']);
Route::middleware('auth:api')
->post('/job', [JobController::class,'store']);
//end job controller



