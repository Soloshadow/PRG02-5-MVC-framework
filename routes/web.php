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
Route::group(['middleware' => ['auth', 'url_protect']], function(){
    
    // Route::get('/{user}/dashboard', 'HomeController@index')->name('home');
    
    // Use a prefix for the route and also group other routes with the same prefix
    Route::prefix('{user}') -> group(function(){
        Route::get('dashboard', 'HomeController@index') -> name('home');
        Route::get('projects/', 'ProjectsListController@index')->name('projects.index');
        Route::get('projects/show/{id}/', 'ProjectsListController@show')->name('projects.show');
        Route::get('projects/create', 'ProjectsListController@create')->name('projects.create');
    });
});


