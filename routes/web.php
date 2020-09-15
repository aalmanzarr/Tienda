<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/index', 'HomeController@index')->name("pages.index");
Route::get('/contact', 'HomeController@contact')->name("pages.contact");
//Products
Route::get('/product/show/{sort}', 'ProductController@show')->name("product.showProducts");
Route::get('/product/showDetails/{id}/', 'ProductController@showDetails')->name("product.showDetails");
Route::get('/catalogue/{catalogue_id}/createProduct', 'ProductController@create')->name("product.createProducts");
Route::post('/product/save', 'CommentController@save')->name("comment.save");
Route::post('/product/create', 'ProductController@save')->name("product.save");
Route::get('/product/save', 'HomeController@goindex');
Route::delete('/product/delete', 'ProductController@delete')->name("product.delete");
Route::get('/product/delete', 'HomeController@goindex');
//Cart
Route::post('/products/add-to-cart/{id}', 'CartController@addToCart')->name("cart.addToCart");
Route::get('/cart/remove', 'CartController@removeCart')->name("cart.removeCart");
Route::get('/cart/carts', 'CartController@cart')->name("cart.cart");
Route::post('/cart/buy', 'CartController@buy')->name("cart.buy");

//Checkout
Route::get('/checkout/client', 'ClientController@show')->name("checkout.client");
Route::post('/checkout/client', 'ClientController@save')->name("checkout.client.save");
//Route::get('/checkout/shipping', 'ShippingController@show')->name("checkout.shipping");
Route::post('/checkout/shipping', 'ShippingController@save')->name("checkout.shipping.save");
Route::get('/checkout/order', 'orderController@show')->name("checkout.order");
Route::post('/checkout/order', 'orderController@save')->name("checkout.order.save");
//Catalogue
Route::get('/catalogue/showCatalogues', 'CatalogueController@show')->name("catalogue.showCatalogues");
Route::get('/catalogue/showDetails/{id}', 'CatalogueController@showDetails')->name("catalogue.showCataloguesDetails");
Route::get('/catalogue/create', 'CatalogueController@create')->name("catalogue.createCatalogues");
Route::post('/catalogue/save', 'CatalogueController@save')->name("catalogue.save");
Route::get('/catalogue/save', 'HomeController@goindex');
Route::post('/catalogue/delete', 'CatalogueController@delete')->name("catalogue.delete");
Route::get('/catalogue/delete', 'HomeController@goindex');
