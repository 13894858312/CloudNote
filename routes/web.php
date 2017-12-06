<?php

use Illuminate\Support\Facades\App;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// ---------------------------------------------------------------------------------------------

// Web

Route::get('', function () {
    return view('base');
})->name('home');

// ---------------------------------------------------------------------------------------------

// Mobule: AUTH

Route::group(['as' => 'auth.'], function () {
    Route::get('signup','Auth\RegisterController@signup')->name('signup');
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', ['as' => 'login', 'uses' => 'Auth\LoginController@login']);
    Route::post('register', 'Auth\RegisterController@register')->name('register');
    Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LogoutController@logout']);

    Route::get('password/email', ['as' => 'password.forgot', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/email', ['as' => 'password.send', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset/{token}', ['as' => 'password.reset', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
    Route::post('password/update', ['as' => 'password.update', 'uses' => 'Auth\ResetPasswordController@reset']);
});

// ---------------------------------------------------------------------------------------------

Route::get('index', 'Admin\Users\UsersController@testadmin')->name('index');

// Note User

Route::group(['middleware' => 'auth', 'prefix' => 'user', 'as' => 'user.'], function () {

    Route::get('categorysearch', 'User\DashboardController@category')->name('categorysearch');
    Route::get('notesearch', 'User\DashboardController@note')->name('notesearch');
    Route::get('categoryresult', 'User\DashboardController@searchCategory')->name('search.category');
    Route::get('noteresult', 'User\DashboardController@searchNote')->name('search.note');
    // Mobule: Note

    Route::group(['prefix' => 'note', 'as' => 'note.'], function () {

        // Categorys
        Route::resource('categorys', 'User\Note\CategorysController');
        Route::post('categorys/update/{id}', 'User\Note\CategorysController@update')->name('categorys.update');
        Route::post('categorys/destroy', 'User\Note\CategorysController@destroy')->name('categorys.destroy');

        // Posts
        Route::resource('posts', 'User\Note\PostsController');
        Route::get('posts/detail/{id}', 'User\Note\PostsController@detail')->name('posts.detail');
        Route::post('posts/update/{id}', 'User\Note\PostsController@update')->name('posts.update');
        Route::post('posts/destroy', 'User\Note\PostsController@destroy')->name('posts.destroy');
        Route::any('posts/upload/{id?}', 'User\Note\PostsController@upload')->name('posts.upload');

    });

    // Mobule: PROFILE

    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('', ['as' => 'profile', 'uses' => 'User\Profile\ProfileController@index']);
        Route::post('update', ['as' => 'update', 'uses' => 'User\Profile\ProfileController@password']);
    });

    // ---------------------------------------------------------------------------------------------

});

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function () {

    // Mobule: PROFILE

    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('', ['as' => 'profile', 'uses' => 'Admin\Profile\ProfileController@index']);
        Route::post('update', ['as' => 'update', 'uses' => 'Admin\Profile\ProfileController@password']);
    });

    // ---------------------------------------------------------------------------------------------

});

    // Mobule: USERS

Route::resource('manage', 'Admin\Users\UsersController');
Route::post('manage/update/{id}', 'Admin\Users\UsersController@update')->name('manage.update');
Route::post('manage/destroy', 'Admin\Users\UsersController@destroy')->name('manage.destroy');

// ---------------------------------------------------------------------------------------------

// ---------------------------------------------------------------------------------------------
