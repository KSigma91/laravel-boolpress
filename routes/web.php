<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

# va messa sotto Route::middleware e modificarla
// Route::get('/', function () {
//     return view('guests.home');
// })->name('home');

Auth::routes();

Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', 'AdminController@dashboard')->name('dashboard');
        Route::get('users', 'UserController@index')->name('users.index');
        Route::get('myPosts', 'PostController@myIndex')->name('posts.myIndex');
        Route::get('getslug', 'PostController@getSlug')->name('posts.getSlug');
        Route::resource('posts', 'PostController');
        Route::resource('categories', 'CategoryController');
        Route::resource('tags', 'TagController');
    });

Route::get("{any?}", function () {
    return view('guests.home');
})->where("any", ".*")->name('home');
