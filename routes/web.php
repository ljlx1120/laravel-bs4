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

Route::get('/', 'HomeController@index')->name('welcome');

Auth::routes();

Route::post('register', 'HomeController@register');

Route::get('verify/{email}/{verify_token}', 'HomeController@verifyEmail')->name('verify.email');
Route::get('home', 'HomeController@home')->middleware('home.redirect')->name('home');
Route::get('profile', 'ProfileController@index')->name('profile');
Route::get('admin', 'AdminController@index')->name('admin');
Route::get('projects', 'ProjectsController@index')->name('projects');
Route::get('about', 'AboutController@index')->name('about');
Route::get('contact', 'ContactController@index')->name('contact');