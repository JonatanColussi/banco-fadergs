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

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'auth'], function (){

   Route::group(['prefix' => 'clients'], function (){
       Route::get('/', 'ClientsController@index')->name('clients.index');
       Route::get('/insert', 'ClientsController@insert')->name('clients.insert');
       Route::get('/edit/{client_id}', 'ClientsController@edit')->name('clients.edit');
       Route::post('/save', 'ClientsController@save')->name('clients.save');
   });

    Route::group(['prefix' => 'accounts'], function (){
        Route::get('/', 'AccountsController@index')->name('accounts.index');
        Route::get('/insert', 'AccountsController@insert')->name('accounts.insert');
        Route::get('/edit/{account_id}', 'AccountsController@edit')->name('accounts.edit');
        Route::post('/save', 'AccountsController@save')->name('accounts.save');
    });

    Route::group(['prefix' => 'agencies'], function (){
        Route::get('/', 'AgenciesController@index')->name('agencies.index');
        Route::get('/insert', 'AgenciesController@insert')->name('agencies.insert');
        Route::get('/edit/{agency_id}', 'AgenciesController@edit')->name('agencies.edit');
        Route::post('/save', 'AgenciesController@save')->name('agencies.save');
    });

    Route::group(['prefix' => 'movements'], function (){
        Route::get('/', 'MovementsController@index')->name('movements.index');
        Route::get('/insert', 'MovementsController@insert')->name('movements.insert');
        Route::post('/save', 'MovementsController@save')->name('movements.save');
        Route::get('/extract/{account_id}', 'MovementsController@extract')->name('movements.extract');
    });

    Route::group(['prefix' => 'movement_types'], function (){
        Route::get('/', 'MovementTypesController@index')->name('movement_types.index');
        Route::get('/insert', 'MovementTypesController@insert')->name('movement_types.insert');
        Route::get('/edit/{movement_type_id}', 'MovementTypesController@edit')->name('movement_types.edit');
        Route::post('/save', 'MovementTypesController@save')->name('movement_types.save');
        Route::delete('/delete/{movement_type_id}', 'MovementTypesController@delete')->name('movement_types.delete');
    });

    Route::group(['prefix' => 'account_types'], function (){
        Route::get('/', 'AccountTypesController@index')->name('account_types.index');
        Route::get('/insert', 'AccountTypesController@insert')->name('account_types.insert');
        Route::get('/edit/{account_type_id}', 'AccountTypesController@edit')->name('account_types.edit');
        Route::post('/save', 'AccountTypesController@save')->name('account_types.save');
        Route::delete('/delete/{account_type_id}', 'AccountTypesController@delete')->name('account_types.delete');
    });
});