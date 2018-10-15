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
        Route::resource('/incidencias','ReportController')->parameters([
            'incidencias' => 'incidencia'
        ]);

        Route::middleware(['admin'])->group(function () {
            Route::resource('/usuarios','UserController')->parameters([
                'usuarios' => 'usuario'
            ])->except('create','show');

            Route::resource('/proyectos','ProjectController')->parameters([
                'proyectos' => 'proyecto'
            ]);

            Route::get('proyectos/{proyecto}/activar','ProjectController@active')->name('proyectos.active');

            Route::post('/categorias/{proyecto}','ProjectController@storeCategory')->name('categorias.store');
            Route::post('/niveles/{proyecto}','ProjectController@storeLevel')->name('niveles.store');

            Route::get('/admin','AdminController@index')->name('config');
        });

    });

});

