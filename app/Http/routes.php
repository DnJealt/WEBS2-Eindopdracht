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


//WelcomeController Route
//Route::get('/', 'WelcomeController@index');                     //basic standard view

//HomeController Routes
Route::get('/', 'HomeController@index');                        //view made, not finished
Route::get('about', 'HomeController@about');                    //view made, not finished
Route::get('contact', 'HomeController@contact');                //view made, not finished

//ProductController Routes
Route::get('product', 'ProductController@index');               //view made, not finished
Route::get('productDetail/{id?}', 'ProductController@show');    //view made, not finished

//CategorieController Routes
//Route::get('', '');
//Route::post('', '');
//Route::get('', '');
//Route::post('', '');
//Route::get('', '');

//CartController Routes
Route::get('cart', 'CartController@index');                                             //view not made, not finished

//UserController Routes
Route::get('login', 'UserController@getLogin');                 //finished
Route::post('login', 'UserController@postLogin');               //finished
Route::get('logout', 'UserController@logout');                  //finished, calls action redirects back
Route::get('register', 'UserController@getRegister');           //view made, not finished
Route::post('register', 'UserController@postRegister');         //not finished

//AdminController Routes
Route::get('CMS', 'AdminController@index');                     //view not made, not finished
//Route::get('', '');

