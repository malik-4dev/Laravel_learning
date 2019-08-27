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

Route::get('markAsRead',function ()
{
auth()->user()->unreadNotifications->markAsRead();
return redirect()->back();
})->name('markRead');


Route::group(['middleware' => ['auth']], function() {
    route::resource('roles','RoleController');
    route::resource('users','UserRoleController');
    route::resource('company','AdminCompanyController');
});
