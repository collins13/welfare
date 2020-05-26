<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// frontend routes below here
Route::get('/about', 'pagesController@about')->name('about');
Route::get('/courses', 'pagesController@courses')->name('courses');
Route::get('/donate', 'pagesController@donate')->name('donate');
Route::get('/blog', 'pagesController@blog')->name('blog');
Route::get('/gallery', 'pagesController@gallery')->name('gallery');
Route::get('/events', 'pagesController@events')->name('events');
Route::get('/contact', 'pagesController@contact')->name('contact');


// backend routes below here


// api intergration routes below here



// madam grace routes below here

