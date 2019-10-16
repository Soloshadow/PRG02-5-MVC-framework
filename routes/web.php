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


// Grouping the routes which requires the users to be logged in
Route::group(['middleware' => ['auth']], function(){
    
    Route::get('/{user}/dashboard', 'HomeController@index')->name('home');
    Route::get('/projects/', 'ProjectsListController@index')->name('projects')->middleware('auth');
    Route::get('/projects/{id}/', 'SingleProject@index')->name('singleproject');
});

// Route::get('/projects/', 'ProjectsListController@index')->name('projects')->middleware('auth');

// Route::get('/projects/{id}/', 'SingleProject@index')->name('singleproject');

