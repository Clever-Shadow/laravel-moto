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
    $config['center'] = 'New York, USA';
	$config['zoom'] = '14';
    $config['map_height'] = '500px';
	$config['scroolwheel'] = false;

	GMaps::initialize($config);
	
	$map = GMaps::create_map();
	
    return view('welcome')->with('map');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
