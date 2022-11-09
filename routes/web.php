<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(\App\Http\Controllers\UserController::class)->group(function (){
    Route::get('/', 'index')->name('user.index');
    Route::get('/home', 'index')->name('user.index');
    Route::get('/login', 'login')->name('user.login')->middleware('guest');
    Route::get('/registration', 'registration')->name('user.registration')->middleware('guest');
    Route::get('/profile', 'profile')->name('user.profile')->middleware('auth');
    Route::get('/logout', 'logout')->name('user.logout');


    Route::post('/login', 'handleLogin')->name('user.handleLogin');
    Route::post('/registration', 'handleRegistration')->name('user.handleRegistration');
});

Route::prefix('admin')->controller(\App\Http\Controllers\AdminController::class)->group(function (){
    Route::get('/', 'index')->name('admin.index');
    Route::get('/home', 'index')->name('admin.index');
    Route::get('/login', 'login')->name('admin.login')->middleware('guest:webadmin');
    Route::get('/registration', 'registration')->name('admin.registration')->middleware('guest:webadmin');
    Route::get('/profile', 'profile')->name('admin.profile')->middleware('auth:webadmin');
    Route::get('/logout', 'logout')->name('admin.logout');

    Route::post('/login', 'handleLogin')->name('admin.handleLogin');
    Route::post('/registration', 'handleRegistration')->name('admin.handleRegistration');
});
