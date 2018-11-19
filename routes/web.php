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

})->name("root");

Auth::routes();

Route::prefix("auth")->group(function (){

    Route::get('facebook', 'Auth\RegisterController@redirectToProvider')->name('fb');
    Route::get('facebook/callback', 'Auth\RegisterController@handleProviderCallback');

});


Route::group(['middleware' => ['auth']], function () {

    Route::prefix("manage")->group(function () {

        Route::get("/", "ManageController@Index");

        Route::get("Dashboard", "ManageController@Dashboard")->name("manage");

        Route::resource("Users", "DashboardUser");

        Route::resource("Status","Status");

        Route::resource("Article","ArticleController");

        Route::resource("Notification","NotificationController");

        Route::get('/settings','DashboardUser@settings')->name('settings');

        Route::resource('Checkout','CheckoutController');

    });

       Route::prefix("me")->group(function (){

          Route::get("/","ProfileController@index")->name('account::index');

          Route::post("/upload","ProfileController@UploadImage")->name('upload::image');

       });

});
