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

Route::get('/developers', 'UserController@index')->name('developers.index');
Route::post('/developers/search', 'UserController@searchDevs')->name('developers.search');
// Route::get('/developers/search', 'UserController@searchDevs')->name('developers.results');

Auth::routes();


// Grouping the routes which requires the users to be logged in
// the url_protect middleware prevent users for accessing others pages by changing the id in the url
Route::group(['middleware' => 'auth'], function(){
    
    // Route::get('/{user}/dashboard', 'HomeController@index')->name('home');
    
    // Use a prefix for the route and also group other routes with the same prefix
    Route::prefix('{user}') -> group(function(){
        Route::get('dashboard', 'HomeController@index') -> name('home');

        Route::resource('projects', 'ProjectsListController');
        
        Route::prefix('projects/{project}') -> group(function(){
            Route::resource('tasks', 'TaskController');
        });
    });
    
});


