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

Route::get('/', 'IndexController@index')->name('index');
Route::get('/posts/single/{title}', 'IndexController@single')->name('post.single');
Route::post('/comment/{id}', 'IndexController@comment')->name('index.comment');

Auth::routes();

Route::prefix('manage')->middleware('role:administrator|client|editor')->group(function(){
    Route::get('/', 'Admin\ManageController@index');
    Route::get('/dashboard', 'Admin\ManageController@dashboard')->name('admin.dashboard');

    // User
    Route::get('/user', 'UserController@index')->name('user.index');
    Route::get('/user/create', 'UserController@create')->name('user.create')->middleware('can:create-users');
    Route::post('/user/store', 'UserController@store')->name('user.store')->middleware('can:create-users');
    Route::get('/user/edit/{id}', 'UserController@edit')->name('user.edit')->middleware('can:update-users,id');
    Route::put('/user/update/{id}', 'UserController@update')->name('user.update')->middleware('can:update-users,id');
    Route::get('/user/show/{id}', 'UserController@show')->name('user.show')->middleware('can:read-users,id');
    Route::delete('/user/destroy/{id}', 'UserController@destroy')->name('user.destroy')->middleware('can:delete-users,id');

    Route::resource('/role', 'Admin\RoleController', ['except'=>'destroy']);
    Route::resource('/permission', 'Admin\PermissionController', ['except'=>'destroy']);

    // Post
    Route::get('/post', 'PostController@index')->name('post.index');
    Route::get('/post/create', 'PostController@create')->name('post.create');
    Route::post('/post/store', 'PostController@store')->name('post.store');
    Route::get('/post/show/{id}', 'PostController@show')->name('post.show');
    Route::get('/post/edit/{id}', 'PostController@edit')->name('post.edit');
    Route::put('/post/update/{id}', 'PostController@update')->name('post.update');
    Route::delete('/post/destroy/{id}', 'PostController@destroy')->name('post.destroy');

});

Route::get('/home', 'HomeController@index')->name('home');
