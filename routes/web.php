<?php

use App\Http\Controllers\PasswordController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\StaticPagesController;
use App\Http\Controllers\StatusesController;
use App\Http\Controllers\TestsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/',[StaticPagesController::class, 'home'])->name('home');
Route::get('/help', [StaticPagesController::class, 'help'])->name('help');
Route::get('/about',[StaticPagesController::class, 'about'])->name('about');
Route::get('signup',[UsersController::class,'create'])->name('signup');
Route::resource('users', UsersController::class);


Route::get('login', [SessionsController::class, 'create'])->name('login');
Route::post('login', [SessionsController::class, 'store'])->name('login');
Route::delete('logout', [SessionsController::class, 'destroy'])->name('logout');

Route::get('signup/confirm/{token}', [UsersController::class, 'confirmEmail'])->name('confirm_email');

Route::get('password/reset', [PasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [PasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [PasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [PasswordController::class, 'reset'])->name('password.update');

Route::resource('statuses', StatusesController::class)->only(['store', 'destroy']);


// 测试页面
Route::get('tests', [TestsController::class, 'index'])->name('tests.index');



Route::get('users/{user}/followings', [UsersController::class, 'followings'])->name('users.followings');
Route::get('users/{user}/followers', [UsersController::class, 'followers'])->name('users.followers');
