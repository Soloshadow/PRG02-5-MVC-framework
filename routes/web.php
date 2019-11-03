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

Route::get('/developers', 'UserController@index')->name('developers.index');
Route::post('/developers/search', 'UserController@searchDevs')->name('developers.search');
Route::get('/developers/search/results', 'UserController@searchDevs')->name('developers.results');

Auth::routes();


// Grouping the routes which requires the users to be logged in
// the url_protect middleware prevent users for accessing others pages by changing the id in the url
Route::group(['middleware' => ['auth', 'url_protect']], function(){
    
    // Route::get('/{user}/dashboard', 'HomeController@index')->name('home');
    
    // Use a prefix for the route and also group other routes with the same prefix
    Route::prefix('{user}') -> group(function(){
        Route::get('dashboard', 'HomeController@index') -> name('home');

        Route::resource('projects', 'ProjectsListController')->middleware('lead_access:project leader');

        // Route::resource('projects', 'ProjectsListController')->middleware('lead_access:project leader')->except([
        //     'show', 'edit'
        // ]);

        // Route::get('projects/', 'ProjectsListController@index')->name('projects.index');
        // Route::get('show/{id}/', 'ProjectsListController@show')->name('projects.show');
        // Route::get('show/{id}/edit', 'ProjectsListController@edit')->name('projects.edit');
        // Route::post('/show/{id}/', 'TaskController@store')->name('task.store');
        
        Route::prefix('projects/{project}') -> group(function(){
            Route::resource('tasks', 'TaskController');
        });
    });
    
});


