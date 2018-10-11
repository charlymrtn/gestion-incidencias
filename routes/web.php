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

Route::get('/', 'HomeController@welcome')->name('welcome');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::namespace('Admin')->group(function () {
        Route::get('/reportar', 'ReportController@report')->name('reportar');

        Route::middleware(['admin'])->group(function () {
            Route::get('/usuarios','UserController@index')->name('usuarios');
            Route::get('/proyectos','ProjectController@index')->name('proyectos');
            Route::get('/admin','AdminController@index')->name('config');
        });

    });

});

