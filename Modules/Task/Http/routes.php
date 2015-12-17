<?php

Route::resource('task', 'TaskController', ['except' => ['update', 'destroy']]);
Route::post('task/{task}', ['uses' => 'TaskController@update', 'as' => 'task.update']);
Route::get('task/{task}', ['uses' => 'TaskController@destroy', 'as' => 'task.destroy']);

// order
Route::post('order', ['uses' => 'TaskController@order', 'as' => 'task.order']);


