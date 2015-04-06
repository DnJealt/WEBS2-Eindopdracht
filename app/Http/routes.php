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

//ProductController Routes
Route::get('product', 'ProductController@index');               //view made, not finished
Route::get('productDetail/{id?}', 'ProductController@show');    //view made, not finished

//CategorieController Routes
Route::get('menu', 'CategorieController@index');                //header test view
//Route::post('', '');
Route::get('categorie/{id?}', 'CategorieController@categorieIndex');
//Route::post('', '');
//Route::get('', '');

//CartController Routes
Route::get('cart', 'CartController@index');                     //view made, not finished
Route::post('addToCart/{id?}', 'CartController@addToCart');     //post method for adding product to session
Route::post('removeFromCart/{id?}', 'CartController@removeFromCart');    //post method for removing product from cart
Route::get('cart/checkOut', 'CartController@checkout');              //

Route::get('emptyCart', 'CartController@emptyCart');            //clears session data
Route::get('showSession', 'CartController@showSession');

//UserController Routes
Route::get('login', 'UserController@getLogin');                 //finished
Route::post('login', 'UserController@postLogin');               //finished
Route::get('logout', 'UserController@logout');                  //finished, calls action redirects back
Route::get('register', 'UserController@getRegister');           //finished
Route::post('register', 'UserController@postRegister');         //not finished, duplicate user not checked yet

//AdminController Routes
Route::get('CMS', 'AdminController@index');                     //view not made, not finished
Route::get('CMS/createProduct', 'AdminController@createProduct');
Route::post('CMS/storeProduct', 'AdminController@storeProduct');
Route::get('CMS/updateProduct', 'AdminController@updateProduct');
Route::get('CMS/updateProduct/{id?}', 'AdminController@getUpdateProduct');
Route::post('CMS/updateProduct/{id?}', 'AdminController@postUpdateProduct');
//Route::get('', '');

