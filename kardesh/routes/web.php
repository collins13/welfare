<?php

use Illuminate\Support\Facades\Route;
use App\Donate;
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

// Route::get('/', function () {
//     $donates = Donate::orderBy('id', 'DESC')->paginate(3);
//     return view('welcome', compact('donates'));
// });

Auth::routes();

Route::get('/', 'pagesController@index')->name('/');
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
Route::get('/event_detail/{id}', 'pagesController@event_detail')->name('event_detail');

//contact routes
Route::post('/addcontact', 'AdminController@addcontact')->name('addcontact');

// backend routes below here

// Route::get('/test', 'baseController@index')->name('base');

Route::group(['prefix'=>'kardesh','middleware' => 'auth'], function() {
// courses
Route::get('/dashboard', 'baseController@dashboard')->name('dashboard');
Route::get('/get_course', 'AdminController@get_course')->name('get_course');
Route::post('/add_course', 'AdminController@add_course')->name('add_course');
Route::get('/edit_course', 'AdminController@edit_course')->name('edit_course');
Route::post('/update_course', 'AdminController@update_course')->name('update_course');
Route::post('/delete_course/{id}', 'AdminController@delete_course')->name('delete_course');

// events
Route::get('/get_event', 'AdminController@get_event')->name('get_event');
Route::post('/add_event', 'AdminController@add_event')->name('add_event');
Route::get('/edit_event', 'AdminController@edit_event')->name('edit_event');
Route::post('/update_event', 'AdminController@update_event')->name('update_event');
Route::post('/delete_event/{id}', 'AdminController@delete_event')->name('delete_event');


// blog
Route::get('/get_blog', 'AdminController@get_blog')->name('get_blog');
Route::post('/add_blog', 'AdminController@add_blog')->name('add_blog');
Route::get('/edit_blog', 'AdminController@edit_blog')->name('edit_blog');
Route::post('/update_blog', 'AdminController@update_blog')->name('update_blog');
Route::post('/delete_blog/{id}', 'AdminController@delete_blog')->name('delete_blog');

// categories
Route::post('/add_cat', 'AdminController@add_cat')->name('add_cat');
Route::get('/edit_cat', 'AdminController@edit_cat')->name('edit_cat');
Route::post('/update_cat', 'AdminController@update_cat')->name('update_cat');
Route::post('/delete_cat/{id}', 'AdminController@delete_cat')->name('delete_cat');


// users
Route::get('/get_user', 'AdminController@get_user')->name('get_user');
Route::get('/add_user', 'AdminController@add_user')->name('add_user');
Route::get('/edit_user', 'AdminController@edit_user')->name('edit_user');
Route::get('/update_user', 'AdminController@update_user')->name('update_user');
Route::get('/delete_user', 'AdminController@delete_user')->name('delete_user');

// plans
Route::get('/plans', 'AdminController@plans')->name('plans');
Route::post('/new_plan', 'AdminController@new_plan')->name('new_plan');
Route::get('/edit_plan', 'AdminController@edit_plan')->name('edit_plan');
Route::post('/update_plan', 'AdminController@update_plan')->name('update_plan');
Route::post('/delete_plan/{id}', 'AdminController@delete_plan')->name('delete_plan');



// api intergration routes below here
Route::get('/user', 'AdminController@user')->name('user');
Route::post('/new_user', 'AdminController@new_user')->name('new_user');
Route::post('/delete_user/{id}', 'AdminController@delete_user')->name('delete_user');
});




Route::post('payment', 'PayPalController@payment')->name('payment');
Route::get('cancel', 'PayPalController@cancel')->name('payment.cancel');
Route::get('payment/success', 'PayPalController@success')->name('payment.success');
Route::get('get_details', 'AdminController@get_details')->name('get_details');



// madam grace routes below here

