<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('jwt.auth')->get('/users', function (Request $request) {
    return $request->user();
});


Route::apiResource('APIArticle', 'API\ArticleController');

Route::post('register','API\Register@Register');

Route::post('login','API\Login@LoginValidator');