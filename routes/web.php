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

Route::get('/home', 'HomeController@index');

Route::get('main_page', function () {
    return view('requests.main_page');
});

Route::get('add_request', function () {
    return view('requests.add_request');
});

Route::post('request_added', function () {
    return view('requests.request_added');
});

Route::get('edit_request', function () {
    return view('requests.edit_request');
});

Route::post('request_edited', function () {
    return view('requests.request_edited');
});

Route::post('submit_register_request', function () {
    return view('auth.submit_register_request');
});

Route::get('apply_filters', function () {
    return view('requests.apply_filters');
});

Route::get('manage_users', function () {
    return view('user.manage_users');
});

Route::get('register_request_edited', function () {
    return view('auth.register_request_edited');
});

Route::get('stock', function () {
    return view('stock.stock_main');
});

Route::get('stock_supply', function () {
    return view('stock.stock_supply');
});

Route::get('stock_write_off', function () {
    return view('stock.stock_write_off');
});

Route::get('stock_new_supply', function () {
    return view('stock.stock_new_supply');
});

Route::get('stock_new_write_off', function () {
    return view('stock.stock_new_write_off');
});

Route::post('stock_supply_added', function () {
    return view('stock.stock_supply_added');
});

Route::post('stock_writed_off', function () {
    return view('stock.stock_writed_off');
});

Route::get('stock_add_item', function () {
    return view('stock.stock_add_item');
});

Route::post('stock_item_added', function () {
    return view('stock.stock_item_added');
});

Route::get('/test2', 'StockController@TestFunction');