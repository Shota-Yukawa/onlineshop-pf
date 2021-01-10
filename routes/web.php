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
//テスト用
Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/login', function () {
    return view('admin.auth.login');
});
Route::get('/user/login', function () {
    return view('user.auth.login');
});



Route::namespace('User')->prefix('user')->name('user.')->group(function() {
  //ログイン認証関連
  Auth::routes([
    'register' => true,
    'reset'    => false,
    'verify'   => false
  ]);
  // ログイン認証後
  Route::middleware('auth:user')->group(function () {

      // TOPページ
      Route::resource('home', 'HomeController', ['only' => 'index']);

  });
  Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');
  Route::post('signup', 'Auth\RegisterController@register')->name('auth.register.post');
  Route::get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
  Route::post('login', 'Auth\LoginController@login')->name('auth.login.post');
  Route::get('logout', 'Auth\LoginController@logout')->name('auth.logout.get');
});

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function() {
  //ログイン認証関連
  Auth::routes([
    'register' => true,
    'reset'    => false,
    'verify'   => false
  ]);
  // ログイン認証後
  Route::middleware('auth:admin')->group(function () {

      // TOPページ
      Route::resource('home', 'HomeController', ['only' => 'index']);

  });
  Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');
  Route::post('signup', 'Auth\RegisterController@register')->name('auth.register.post');
  Route::get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
  Route::post('login', 'Auth\LoginController@login')->name('auth.login.post');
  Route::get('logout', 'Auth\LoginController@logout')->name('auth.logout.get');


});

Route::prefix('admin/items')->name('admin.items.')->group(function() {
// Route::group(['middleware' => ['auth:admin'], 'prfixe' => 'admin/items', 'name' => 'admin.items.'], function () {
  // Route::resource('users', 'UsersController');
  Route::middleware('auth:admin')->group(function () {
    Route::get('index', 'ItemsController@index')->name('index');
    Route::get('add', 'ItemsController@add')->name('add');
    Route::post('store', 'ItemsController@store')->name('store');
    Route::get('detail/{id}', 'ItemsController@detail')->name('detail');
    Route::get('edit/{id}', 'ItemsController@edit')->name('edit');
    Route::put('update/{id}', 'ItemsController@update')->name('update');
    Route::delete('destory/{id}', 'ItemsController@destroy')->name('destroy');
  });
});
