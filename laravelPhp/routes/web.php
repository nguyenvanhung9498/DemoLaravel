<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::get('/listtask', [TaskController::class, 'viewlistTask'])
        ->name('listTask');
    Route::get('/', [TaskController::class, 'viewlistTask']);
    Route::post('/insertTask', [TaskController::class, 'insertTask'])
        ->name('insertTask');
});
Route::get('/login', [LoginController::class, 'viewFormlogin'])->name('login');
Route::post('/login', [LoginController::class, 'checkUserInfo'])->name('loginPost');
Route::get('/sign_up', [SignupController::class, 'signup'])->name('signup');
Route::post('/sign_up', [SignupController::class, 'signupComplete'])->name("signupComplete");
Route::get('/logout', [LogoutController::class, 'logout'])->name("logout");
?>
