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
Route::get('/', 'HomeController@index');                        //view not made, not finished
Route::get('about', 'HomeController@about');                    //view not made, not finished
Route::get('contact', 'HomeController@contact');                //view not made, not finished

//ProductController Routes
Route::get('product', 'ProductController@index');           //view made, not finished
Route::get('productDetail/{id?}', 'ProductController@show');    //view made, not finished

//CategorieController Routes


//UserController Routes
Route::get('login', 'UserController@login');                    //view not made, not finished
Route::get('register', 'UserController@register');              //view not made, not finished

//AdminController Routes
Route::get('CMS', 'AdminController@index');                     //view not made, not finished

