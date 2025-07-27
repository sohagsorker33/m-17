<?php

use App\Http\Controllers\DemoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

 Route::get('/demo',[DemoController::class,'tableSelect']);

 Route::get('/demo2',[DemoController::class,'tableSpecificSelect']);

 Route::get('/demo3',[DemoController::class,'tableSpecificDataSelect']);

 Route::get('/demo4',[DemoController::class,'Aggregates']);

 Route::get('/demo5',[DemoController::class,'select']);

 Route::get('/demo6',[DemoController::class,'innerJoin']);

 Route::get('/demo7',[DemoController::class,'leftRightJoin']);

 Route::get('/demo8',[DemoController::class,'crossJoin']);

 Route::get('/demo9',[DemoController::class,'advancedJoinCluse']);

 Route::get('/demo10',[DemoController::class,'union']);

 Route::get('/demo11',[DemoController::class,'ascDesc']);

 Route::get('/demo12',[DemoController::class,'groupBy']);