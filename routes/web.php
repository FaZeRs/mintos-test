<?php

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

// Auth
Route::get('login')->name('login')->uses('Auth\LoginController@showLoginForm');
Route::post('login')->name('login.attempt')->uses('Auth\LoginController@login');
Route::post('logout')->name('logout')->uses('Auth\LoginController@logout');
Route::get('register')->name('register')->uses('Auth\RegisterController@showRegistrationForm');
Route::post('register')->name('register.post')->uses('Auth\RegisterController@register');
Route::post('validate-email')->name('validate.email')->uses('Auth\ValidateController@email');

// Dashboard
Route::get('/')->name('dashboard')->uses('DashboardController')->middleware('auth');
