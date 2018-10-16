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
            ])->except('create','show');

            Route::get('proyectos/{proyecto}/activar','ProjectController@active')->name('proyectos.active');

            Route::resource('/categorias','CategoryController')->parameters([
                'categorias' => 'categoria'
            ])->only('store','update','destroy');

            Route::resource('/niveles','LevelController')->parameters([
                'niveles' => 'nivel'
            ])->only('store','update','destroy');

            Route::get('/proyecto/{proyecto}/niveles','LevelController@getLevelsByProject')->name('proyecto.niveles');

            Route::get('/admin','AdminController@index')->name('config');
        });

    });

});

