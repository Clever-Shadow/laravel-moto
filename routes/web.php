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
   // $config['center'] = '54.31999998, 48.40574311';
	//$config['zoom'] = '14';
    //$config['map_height'] = '500px';
	//$config['scrollwheel'] = false;

	//GMaps::initialize($config);
	
	//$map = GMaps::create_map();
	
    return view('index');
});

Route::get('/form', function () {
	return view('form');
});

Route::get('/chat', function () {
	return view('chat');
});

Route::get('/moto', function () {
	return view('createalbum');
});


Route::get('/', array('as' => 'index','uses' => 'AlbumsController@getList'));
Route::resource('queries', 'QueryController');
Route::post('/', 'QueryController@search');
Route::get('/createalbum', array('as' => 'create_album_form','uses' => 'AlbumsController@getForm'));
Route::post('/createalbum', array('as' => 'create_album','uses' => 'AlbumsController@postCreate'));
Route::get('/deletealbum/{id}', array('as' => 'delete_album','uses' => 'AlbumsController@getDelete'));
Route::get('/album/{id}', array('as' => 'show_album','uses' => 'AlbumsController@getAlbum'));

Route::get('/addimage/{id}', array('as' => 'add_image','uses' => 'ImageController@getForm'));
Route::post('/addimage', array('as' => 'add_image_to_album','uses' => 'ImageController@postAdd'));
Route::get('/deleteimage/{id}', array('as' => 'delete_image','uses' => 'ImageController@getDelete'));

Route::post('/moveimage', array('as' => 'move_image', 'uses' => 'ImageController@postMove'));

Route::post('/send-mail', 'MailSetting@send_form');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout','Auth/LoginController@userLogout')->name('user.logout');
Route::prefix('admin')->group(function(){
Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/', 'AdminController@admin')->name('admin.dashboard');
Route::get('/logout', 'AdminLoginController@logout')->name('admin.logout');
});
