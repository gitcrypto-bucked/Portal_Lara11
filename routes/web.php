<?php

use App\Http\Middleware\PreventBackHistory;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/login', function () {return view('login');})->middleware('guest')->name('login');

Route::get('/forgot-password', function (){ return view('forgot-password');})->middleware('guest')->name('forgot-password');

Route::post('/userLogin', '\App\Http\Controllers\LoginController@userLogin')->name('userLogin');

Route::match(['get'], '/dashboard','\App\Http\Controllers\NewsController@dashboard')->middleware('auth')->name('dashboard');

Route::match(['get'],'/add_news','\App\Http\Controllers\NewsController@add_News')->middleware('auth')->name('add_news');

Route::match(['post'],'/register_news','\App\Http\Controllers\NewsController@registerNews')->middleware('auth')->name('register_news');

Route::match(['get'], '/news', '\App\Http\Controllers\NotificationController@getNotifications')->name('list-notifications');

Route::match(['post'], '/news', '\App\Http\Controllers\NotificationController@disableNotification')->name('remove-notification');

Route::match(['get'],'/logout','\App\Http\Controllers\LoginController@userLogout')->middleware('auth',PreventBackHistory::class)->name('logout');

Route::match(['get'],'/new_user','\App\Http\Controllers\UserController@newUser')->middleware('auth')->name('new_user');

Route::match(['post'],'/add_user','\App\Http\Controllers\UserController@createNewUser')->middleware('auth')->name('add_user');

Route::match(['get'],'/token/{token}','\App\Http\Controllers\UserController@checkUserToken')->middleware('guest')->name('user-token');

Route::match(['get'],'/expired_link',function (){ return view('expired-link');})->middleware('guest')->name('expired-link');

Route::match(['post'],'/recover-password','\App\Http\Controllers\UserController@recoverPassword')->middleware('guest')->name('recoverPassword');

Route::match(['post'],'/update-password','\App\Http\Controllers\UserController@registerUserPassword')->middleware('guest')->name('updatePassword');
