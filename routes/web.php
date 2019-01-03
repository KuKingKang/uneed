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
    return view('auth.login');
});

Auth::routes();

Route::post('/reg', 'UserController@register')->name('user.reg');

Route::match(["GET", "POST"], "/register", function(){
    return view("auth.register");
})->name("register");

Route::get('/home', 'HomeController@index')->name('home');

Route::resource("users", "UserController");

Route::get('/categories/trash', 'CategoryController@trash')->name('categories.trash');
Route::get('/categories/{id}/restore', 'CategoryController@restore')->name('categories.restore');
Route::delete('/categories/{id}/delete-permanent', 'CategoryController@deletePermanent')->name('categories.delete-permanent');
Route::resource('categories', 'CategoryController');

Route::get('/ajax/categories/search', 'CategoryController@ajaxSearch');

Route::get('/books/trash', 'BookController@trash')->name('books.trash');
Route::post('/books/{id}/restore', 'BookController@restore')->name('books.restore');
Route::delete('/books/{id}/delete-permanent', 'BookController@deletePermanent')->name('books.delete-permanent');
Route::resource('books', 'BookController');

//Route PIN
Route::resource('reqpin', 'RequestPinController');
Route::get('/reqpin/{id}/showhelper', 'RequestPinController@showHelper')->name('reqpin.show-helper');
Route::get('/reqpin/{id}/pilihan', 'RequestPinController@pilih')->name('reqpin.pilih');
Route::get('helper/{id}', 'RequestPinController@helper')->name('reqpin.helper');
Route::get('/reqpin/{id}/konfirmasi', 'RequestPinController@konfirmasi')->name('reqpin.konfirmasi');
Route::get('/reqpin/{id_req}/detil/{id_btn}', 'RequestPinController@detil')->name('reqpin.detil');
Route::get('/reqpin/{id_req}/pilih/{id_btn}', 'RequestPinController@pilih')->name('reqpin.pilih');
Route::get('/reqpin/{id_btn}/finish', 'RequestPinController@finish')->name('reqpin.finish');

//Route Helper
Route::resource('bantuan', 'BantuanController');
Route::get('/bantuan/{id}/showpin', 'BantuanController@showPin')->name('bantuan.show-pin');
Route::get('/bantuan/{id_btn}/pilihan/{id_req}', 'BantuanController@pilih')->name('bantuan.pilih');
Route::get('/bantuan/{id_btn}/detil/{id_req}', 'BantuanController@detil_pin')->name('bantuan.detil_pin');
Route::get('/bantuan/{id_btn}/konfirmasi/{id_req}', 'BantuanController@konfirmasi')->name('bantuan.konfirmasi');
Route::get('/bantuan/{id_btn}/status/', 'BantuanController@status')->name('bantuan.status');
Route::get('/bantuan/{id_btn}/proses/{id_req}', 'BantuanController@proses')->name('bantuan.proses');
Route::get('/bantuan/{id_req}/finish', 'BantuanController@finish')->name('bantuan.finish');
Route::get('pin/{id}', 'BantuanController@pin')->name('bantuan.pin');

Route::resource('orders', 'OrderController');


Route::get('/test/forbidden', function(){
    abort(403, "Anda tidak memiliki hak akses");
});

Route::get('/datatables/users', 'UserDatatablesController@index');
Route::get('/datatables/data', 'UserDatatablesController@data')->name('datatables.data');

Route::get('/test/me', function(){
    return \Auth::user();
});

Route::get('admin-login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::get('/homeadmin', 'AdminController@index')->name('homeadmin');
Route::post('admin-login', ['as'=>'admin-login','uses'=>'Auth\AdminLoginController@login']);
Route::post('logout-admin', 'Auth\AdminLoginController@logout')->name('admin.logout');

