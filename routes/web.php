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

// Route::get('/', function () {
//     return view('dashboard');
// })->middleware('auth');

Auth::routes();

Route::get('/', 'KutipanLetterCController@index');

Route::get('/dashboard', function () {
    return redirect('/kutipan-letter-c');
});

Route::get('/profile', 'ProfileController@index');
Route::post('profile/store', 'ProfileController@store')->name('profile.store');

Route::post('user-management/search', 'UserManagementController@search')->name('user-management.search');
Route::resource('user-management', 'UserManagementController');
Route::post('user-management/store', 'UserManagementController@store')->name('user-management.store');

Route::resource('kutipan-letter-c', 'KutipanLetterCController');
Route::post('kutipan-letter-c/search', 'KutipanLetterCController@search')->name('kutipan-letter-c.search');

Route::get('log-activity', 'LogActivityController@index');
Route::post('log-activity/search', 'LogActivityController@search')->name('log-activity.search');
Route::get('avatars/{name}', 'KutipanLetterCController@load');