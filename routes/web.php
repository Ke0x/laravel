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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{
Route::match(['get', 'post'], '/admin/', 'HomeController@admin');
Route::get('admin', function () {

    $AUser = auth()->user();
    $ASkills = App\Skill::get();

    return view('admin', ['ASkills' => $ASkills], ['AUser' => $AUser]);
})->name('admin');
Route::post('admin/add', 'AdminController@add');
Route::post('admin/update', 'AdminController@update');
Route::post('admin/delete', 'AdminController@delete');
});

Route::group(['middleware' => 'App\Http\Middleware\MemberMiddleware'], function()
{
Route::match(['get', 'post'], '/user/', 'HomeController@member');
Route::get('user', function () {

    $AUser = auth()->user();
    $ASkills = App\Skill::get();

    return view('user', ['ASkills' => $ASkills], ['AUser' => $AUser]);
})->name('user');
Route::post('user/add', 'UserController@add');
Route::post('user/update', 'UserController@update');
Route::post('user/delete', 'UserController@delete');
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');