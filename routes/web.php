<?php

use Illuminate\Support\Facades\App;
use App\Models\Admin\Pages\Contents;

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
});

// ---------------------------------------------------------------------------------------------

// Mobule: AUTH

Route::group(['as' => 'auth.'], function () {
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', ['as' => 'login', 'uses' => 'Auth\LoginController@login']);
    Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LogoutController@logout']);

    Route::get('password/email', ['as' => 'password.forgot', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/email', ['as' => 'password.send', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset/{token?}', ['as' => 'password.reset', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
    Route::post('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ResetPasswordController@reset']);
});

// ---------------------------------------------------------------------------------------------

// Note Admin

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function () {

    // Dashboard
    Route::get('/', ['as' => 'index', 'uses' => 'Admin\DashboardController@index']);

    // Mobule: BLOG

    Route::group(['prefix' => 'note', 'as' => 'note.'], function () {

        // Categorys
        Route::resource('categorys', 'Admin\Note\CategorysController');
        Route::post('categorys/update/{id}', 'Admin\Note\CategorysController@update')->name('categorys.update');
        Route::post('categorys/destroy', 'Admin\Note\CategorysController@destroy')->name('categorys.destroy');

        // Posts
        Route::resource('posts', 'Admin\Note\PostsController');
        Route::post('posts/update/{id}', 'Admin\Note\PostsController@update')->name('posts.update');
        Route::post('posts/destroy', 'Admin\Note\PostsController@destroy')->name('posts.destroy');
        Route::any('posts/upload/{id?}', 'Admin\Note\PostsController@upload')->name('posts.upload');

    });

    // ---------------------------------------------------------------------------------------------

    // Mobule: PAGES

    Route::group(['prefix' => 'pages', 'as' => 'pages.'], function () {

        // Categorys
        Route::resource('categorys', 'Admin\Pages\CategorysController');
        Route::post('categorys/update/{id}', 'Admin\Pages\CategorysController@update')->name('categorys.update');
        Route::post('categorys/destroy', 'Admin\Pages\CategorysController@destroy')->name('categorys.destroy');

        // Contents
        Route::resource('contents', 'Admin\Pages\ContentsController');
        Route::post('contents/update/{id}', 'Admin\Pages\ContentsController@update')->name('contents.update');
        Route::post('contents/destroy', 'Admin\Pages\ContentsController@destroy')->name('contents.destroy');
    });

    // ---------------------------------------------------------------------------------------------

    // Mobule: PROFILE

    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('', ['as' => 'profile', 'uses' => 'Admin\Profile\ProfileController@index']);
        Route::post('update', ['as' => 'update', 'uses' => 'Admin\Profile\ProfileController@password']);
    });

    // ---------------------------------------------------------------------------------------------

    // Mobule: USERS

    Route::resource('users', 'Admin\Users\UsersController');
    Route::post('users/update/{id}', 'Admin\Users\UsersController@update')->name('users.update');
    Route::post('users/destroy', 'Admin\Users\UsersController@destroy')->name('users.destroy');
});

// ---------------------------------------------------------------------------------------------

// Custom pages model

Route::get('/{page}', ['as' => 'pages', function ($page) {
    $page = Contents::where('slug', $page)->first();
    if (isset($page)) {
        return view('pages.template', ['page' => $page]);
    }

    App::abort(404);
}]);

// ---------------------------------------------------------------------------------------------
