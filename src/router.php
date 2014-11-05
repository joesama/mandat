<?php

Route::group(array('namespace' => 'Joesama\Mandat\Router'), function()
{
    Route::get('/data', 'DataController@index');
    Route::post('/data/setup', 'DataController@setup');
    Route::get('/data/new', 'DataController@create');
    Route::post('/data/new', 'DataController@store');
    Route::get('/data/edit/{id}', 'DataController@edit')->where('id', '[0-9]+');
    Route::post('/data/edit/{id}', 'DataController@update')->where('id', '[0-9]+');
    Route::get('/content/manage/{id}', 'ContentController@listData')->where('id', '[0-9]+');
    Route::get('/content/new/{id}', 'ContentController@newData')->where('id', '[0-9]+');
    Route::post('/content/new/{id}', 'ContentController@newData')->where('id', '[0-9]+');
    Route::get('/schema/manage/{id}', 'SchemaController@manageSchema')->where('id', '[0-9]+');
    Route::post('/schema/add/{id}', 'SchemaController@addSchema')->where('id', '[0-9]+');
    Route::get('/schema/create/{id}', 'SchemaController@createScript')->where('id', '[0-9]+');
    Route::get('/schema/edit/{lookid}/{id}', 'SchemaController@addSchema')->where('lookid', '[0-9]+')->where('id', '[0-9]+');

});

