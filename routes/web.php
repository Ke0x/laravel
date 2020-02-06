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

    $AUser = App\Skill::get();
    $ALlusers = App\User::get();

    return view('admin', ['ALlusers' => $ALlusers], ['AUser' => $AUser]);
})->name('admin');


Route::get('admin/{id}', function($id) {

    $AUser = App\User::find($id);
    $ASkills = App\Skill::get();

    return view('adminedit', ['ASkills' => $ASkills], ['AUser' => $AUser]); 
});

Route::get('admin/skill/{id}', function($id) {

    $ASkills = App\Skill::find($id);

    return view('skilledit', ['ASkills' => $ASkills],); 
});

Route::post('editskill', 'AdminController@editskill')->name('editskill');

Route::post('add', 'AdminController@add')->name('add');
Route::post('update', 'AdminController@update')->name('update');
Route::post('delete', 'AdminController@delete')->name('delete');
Route::post('newskill', 'AdminController@newskill')->name('newskill');
});

Route::group(['middleware' => 'App\Http\Middleware\MemberMiddleware'], function()
{
Route::match(['get', 'post'], '/user/', 'HomeController@member');
/*
Route::get('user', function () {

    $AUser = auth()->user();
    $ASkills = App\Skill::get();

    return view('user', ['ASkills' => $ASkills], ['AUser' => $AUser]);
})->name('user');
*/
Route::post('user/add', 'UserController@add');
Route::post('user/update', 'UserController@update');
Route::post('user/delete', 'UserController@delete');
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');