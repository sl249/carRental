<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');//home

//log in and log out routes

Route::get('login', array('uses' => 'HomeController@login'));//login page

Route::post('login', array('uses' => 'HomeController@doLogin'));//login post

Route::get('logout', array('uses' => 'HomeController@doLogout'));//logout

//register routes

Route::get('register', array('uses' => 'HomeController@register'));//register page

Route::post('register', array('uses' => 'HomeController@doRegister'));//register post

//car filtering

Route::get('rent', array('uses' => 'RentalController@index'));//all cars

Route::get('rent/{type}', array('uses' => 'RentalController@rentSpecific'));//specific type of cars

Route::get('rent/{type}/{id}', array('uses' => 'RentalController@carSpecific'));//specific type of car

//order processing and confirmation

Route::post('rent/{type}/{id}/review', array('uses' => 'RentalController@review'));//review rental

Route::post('rent/{type}/{id}/process', array('uses' => 'RentalController@process'));//order processing

Route::get('rent/{type}/{id}/confirm', array('uses' => 'RentalController@confirm'));//order confirmation

//rental display

Route::get('rentals', array('uses' => 'HistoryController@index'));//view all rentals
Route::get('rentals/{state}', array('uses' => 'HistoryController@view'));//open or closed rentals

//rental return/view

Route::get('rentals/open/{id}', array('uses' => 'HistoryController@complete'));//return Car
Route::post('rentals/open/{id}/review', array('uses' => 'HistoryController@review'));//return Car
Route::post('rentals/open/{id}/confirm', array('uses' => 'HistoryController@process'));//return Car
Route::get('rentals/closed/{id}', array('uses' => 'HistoryController@receipt'));//view receipt

