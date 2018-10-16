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
        ])->except('destroy');

        Route::get('/incidencias/{incidencia}/atender','ReportController@take')->name('incidencias.take');
        Route::get('/incidencias/{incidencia}/abrir','ReportController@open')->name('incidencias.open');
        Route::get('/incidencias/{incidencia}/resolver','ReportController@solve')->name('incidencias.solve');
        Route::get('/incidencias/{incidencia}/derivar','ReportController@next')->name('incidencias.next');

        Route::get('proyectos/{proyecto}/seleccionar','ProjectController@select')->name('proyectos.select');

        Route::middleware(['admin'])->group(function () {
            Route::resource('/usuarios','UserController')->parameters([
                'usuarios' => 'usuario'
            ])->except('create','show');

            Route::post('/usuarios/proyectos','ProjectUserController@store')->name('usuarios.proyectos.store');
            Route::put('/usuarios/proyectos/{p_user}','ProjectUserController@update')->name('usuarios.proyectos.update');
            Route::delete('/usuarios/proyectos/{p_user}','ProjectUserController@destroy')->name('usuarios.proyectos.destroy');

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

