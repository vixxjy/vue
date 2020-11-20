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
Route::get('/', 'HomeController@index')->name('home');
Route::get('/landing', 'PagesController@index')->name('home');
Route::get('/contractors/{id}', 'PagesController@show')->name('show.arrears');


if (env('APP_ENV') === 'production') {
  \URL::forceScheme('https');
}

// auth
Route::get('/login',['uses' => 'AuthController@index', 'as' => 'login']);
Route::post('/signin',['uses' => 'AuthController@login', 'as' => 'login.post']);

Route::post('/comments/store',['uses' => 'CommentController@store', 'as' => 'comments.store']);


Route::group( ['middleware' => ['auth']], function() {
  
  // dashboard
  Route::get('/dashboard',['uses' => 'DashbaordController@index', 'as' => 'dashboard']);
  Route::get('/comments/delete/{id}',['uses' => 'DashbaordController@destroy', 'as' => 'comments.delete']);
  Route::get('/logout', ['uses' => 'AuthController@logout','as' => 'logout']);
  Route::get('/users',['uses' => 'UserController@index', 'as' => 'users.index']);
  Route::post('/user/store',['uses' => 'UserController@store', 'as' => 'users.store']);
  Route::post('/user/update/{id}',['uses' => 'UserController@update', 'as' => 'users.update']);
  Route::get('/user/delete/{id}',['uses' => 'UserController@destroy', 'as' => 'users.delete']);
  
  //roles
  Route::get('/roles',['uses' => 'RoleController@index', 'as' => 'roles.index']);
  Route::post('/roles/store',['uses' => 'RoleController@store', 'as' => 'roles.store']); 
  Route::put('/roles/update/{id}', 'RoleController@update')->name('roles.update');
  Route::get('/roles/delete/{id}', 'RoleController@delete')->name('roles.delete');

  // permission
  Route::get('/permissions',['uses' => 'PermissionController@index', 'as' => 'permissions.index']);
  Route::post('/permissions/store',['uses' => 'PermissionController@store', 'as' => 'permissions.store']); 
  Route::put('/permissionsupdate/{id}', 'PermissionController@update')->name('permissions.update');
  Route::get('/permissions/delete/{id}', 'PermissionController@delete')->name('permissions.delete');

});
