<?php

// LOGIN
Route::get('/login', ['uses' => 'Auth\AuthController@getLogin', 'as' => 'login']);
Route::post('/login', ['uses' => 'Auth\AuthController@postLogin', 'as' => 'login']);
Route::get('/logout', ['uses' => 'Auth\AuthController@getLogout', 'as' => 'logout']);

// REGISTER
Route::get('/register', ['uses' => 'Auth\AuthController@getRegister', 'as' => 'register']);
Route::post('/register', ['uses' => 'Auth\AuthController@postRegister', 'as' => 'register']);



