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

 Route::get('demo',[DemoController::class,'tableSelect']);
 Route::get('demo2',[DemoController::class,'tableSpecificSelect']);
 Route::get('demo3',[DemoController::class,'tableSpecificDataSelect']);
 Route::get('demo4',[DemoController::class,'Aggregates']);