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


//userのauth
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
//adminのauth
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

//adminのアイテム機能
Route::prefix('admin/items')->name('admin.items.')->group(function() {
  Route::middleware('auth:admin')->group(function () {
    Route::get('index', 'AdminItemsController@index')->name('index');
    Route::get('add', 'AdminItemsController@add')->name('add');
    Route::post('store', 'AdminItemsController@store')->name('store');
    Route::get('detail/{id}', 'AdminItemsController@detail')->name('detail');
    Route::get('edit/{id}', 'AdminItemsController@edit')->name('edit');
    Route::put('update/{id}', 'AdminItemsController@update')->name('update');
    Route::delete('destory/{id}', 'AdminItemsController@destroy')->name('destroy');
  });
});
//guest用のアイテム閲覧
Route::prefix('guest')->name('guest.items.')->group(function() {
  Route::get('items', 'ItemController@index')->name('index');
  Route::get('detail/{itemid}', 'ItemController@detail')->name('detail');
});
//User用アイテム閲覧
Route::prefix('user')->name('user.items.')->group(function() {
  Route::get('items', 'UserItemsController@index')->name('index');
  Route::get('detail/{itemid}', 'UserItemsController@detail')->name('detail');
  Route::get('{userid}/favorites', 'UserItemsController@favorites')->name('favorites');
  Route::get('{userid}/carts', 'UserItemsController@carts')->name('carts');
});

//userのアイテムfavorite機能
Route::group(['prefix' => 'item{id}'], function () {
       Route::post('favorite', 'UserFavoriteController@store')->name('favorites.favorite');
       Route::delete('unfavorite', 'UserFavoriteController@destroy')->name('favorites.unfavorite');
   });
Route::group(['prefix' => 'item{id}'], function () {
       Route::post('cart', 'UserCartController@store')->name('carts.cart');
       Route::put('recart', 'UserCartController@qtystore')->name('carts.recart');
       Route::delete('uncart', 'UserCartController@destroy')->name('carts.uncart');
   });
