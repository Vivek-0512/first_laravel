<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', [LoginController::class,'loginscreen'])->name('login');
Route::get('/login', [LoginController::class,'loginscreen'])->name('login');
Route::get('/create', [LoginController::class,'signup']);
Route::get('/logout', [LoginController::class,'logout']);
Route::post('/createuser', [LoginController::class,'createuser']);
Route::post('/authenticate', [LoginController::class,'authenticate']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/dashboard', [LoginController::class,'dashboard'])->name('dashboard');
    Route::get('/user', [LoginController::class,'index']);
    Route::post('/createupdate', [LoginController::class,'createupdate']);
    Route::post('/deleteuser', [LoginController::class,'deleteuser']);

});