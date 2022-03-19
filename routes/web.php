<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;



Route::get('/',[MainController::class,'home'])->name('home');
Route::get('/welcome',[MainController::class,'welcome'])->name('welcome');
Route::get('/exit',[MainController::class,'exit'])->name('exit');



Route::get('/login',[MainController::class,'login'])->name('login');
Route::post('/login_pro',[MainController::class,'login_pro']);

Route::get('/registration',[MainController::class,'registration'])->name('registration');
Route::post('/registration_pro',[MainController::class,'registration_pro']);

