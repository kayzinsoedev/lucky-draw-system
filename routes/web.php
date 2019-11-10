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
Route::get('/', 'Auth\LoginController@showLoginForm');
Route::post('/', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');


Auth::routes();
Route::group(['middleware' => ['auth']], function () {
// Admin Portal
Route::resource('/draw', 'AdminController');
// Member Portal
Route::resource('/member', 'MemberController');
});

//Website
Route::get('/result', 'ResultController@showResult');