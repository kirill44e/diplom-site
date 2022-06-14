<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest:admin')->group(function(){
  Route::get('login', [App\Http\Controllers\Admin\AuthController::class, 'index'])->name('login');
  Route::post('login_process', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login_process');
});

Route::middleware('auth:admin')->group(function(){
  Route::resource('contacts', App\Http\Controllers\Admin\AdminController::class);
  Route::resource('courses', App\Http\Controllers\Admin\CoursController::class);
  Route::get('logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
  Route::get('contacts', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('index');
  Route::get('index-cours', [App\Http\Controllers\Admin\CoursController::class, 'index'])->name('index-cours');
});
