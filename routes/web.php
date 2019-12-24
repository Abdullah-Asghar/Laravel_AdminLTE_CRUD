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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   //   dd(app('foo'));
    // dd(app('App\User'));
    
     // return view('welcome');
});

Route::get('/user','UserController@createUser')->name('createUser');
Route::get('/user/show','UserController@showUsers')->name('showUser');
Route::post('/user/save','UserController@saveUser')->name('saveUser');
Route::get('/user/delete/{user}','UserController@deleteUser')->name('deleteUser');
Route::get('/user/edit/{user}','UserController@editUser')->name('editUser');
Route::post('/user/update/{user}','UserController@updateUser')->name('updateUser');

Route::get('/permission','PermissionController@createPermission')->name('createPermission');
Route::post('/permission/save','PermissionController@savePermission')->name('savePermission');
Route::get('/permision/delete/{permission}','PermissionController@deletePermission')->name('deletePermission');
Route::get('permission/edit/{permission}','PermissionController@editPermission')->name('editPermission');
Route::post('permission/update/{permission}','PermissionController@updatePermission')->name('updatePermission');

Route::get('/role','RoleController@createRole')->name('createRole');
Route::post('/role/save','RoleController@saveRole')->name('saveRole');
Route::get('/role/delete/{role}','RoleController@deleteRole')->name('deleteRole');
Route::get('/role/edit/{role}','RoleController@editRole')->name('editRole');
Route::post('/role/update/{role}','RoleController@updateRole')->name('updateRole');




