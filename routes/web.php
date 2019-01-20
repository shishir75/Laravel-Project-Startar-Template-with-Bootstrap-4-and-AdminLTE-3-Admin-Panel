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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

// disable laravel default registration
Route::match(['get', 'post'], 'register', function(){
	return redirect('/');
});


//Route::get('/home', 'HomeController@index')->name('home');

// Admin Group
Route::group(['as'=>'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin'] ], function(){

	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


});


// Editor Group
Route::group(['as'=>'editor.', 'prefix' => 'editor', 'namespace' => 'Editor', 'middleware' => ['auth', 'editor'] ], function (){

	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


});