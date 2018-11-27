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
    $config['center'] = '54.31999998, 48.40574311';
	$config['zoom'] = '14';
    $config['map_height'] = '500px';
	$config['scrollwheel'] = false;

	GMaps::initialize($config);
	
	$map = GMaps::create_map();
	
    return view('welcome')->with('map', $map);
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout','Auth/LoginController@userLogout')->name('user.logout');
Route::prefix('admin')->group(function(){
Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/', 'AdminController@adm')->name('admin.dashboard');
Route::get('/logout', 'AdminLoginController@logout')->name('admin.logout');
});
