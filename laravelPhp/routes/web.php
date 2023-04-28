<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::get('/listtask', [TaskController::class, 'viewlistTask'])
        ->name('listTask');
    Route::get('/', [TaskController::class, 'viewlistTask']);
//    Route::get('/crudPhp', [LoginController::class, 'checkUserInfo'])
//        ->name('listTask');
});
Route::get('/login', [LoginController::class, 'viewFormlogin'])->name('login');
Route::post('/login', [LoginController::class, 'checkUserInfo'])->name('loginPost');
Route::get('/sign_up', [LoginController::class, 'signup'])->name('signup');
Route::post('/sign_up', [LoginController::class, 'signupComplete'])->name("signupComplete");
?>
