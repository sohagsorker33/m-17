<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\ORMController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Query builder Api Route------------

 Route::post('/demo13',[DemoController::class,'Insert']);

 Route::post('/demo14/{id}',[DemoController::class,'Update']);

 Route::post('/demo15/{id}',[DemoController::class,'Delete']);

 //  ORM Api Route------------

 Route::post('/insert',[ORMController::class,"ORMInsert"]);

Route::post('/update/{id}',[ORMController::class,"ORMUpdate"]);

Route::post('/updateOrCreate/{brandName}',[ORMController::class,"ORMUpdateOrCreate"]);

Route::get('/delete/{id}',[ORMController::class,"Delete"]);

Route::post('/allSelect',[ORMController::class,'AllSelect']);

Route::post('/find/{id}',[ORMController::class,'Find']);

Route::get('/randomSelect',[ORMController::class,'RandomSelect']);

Route::post('/pluck',[ORMController::class,'Pluck']);