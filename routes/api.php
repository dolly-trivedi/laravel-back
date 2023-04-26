<?php

use App\Api\Controllers\CategoriesController;
use App\Api\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [UserController::class, 'postLogin']);
Route::post('signup', [UserController::class, 'postSignup']);

Route::group(['middleware' => 'auth.jwt'], function () {
    Route::group(['prefix' => 'categories'], function () {
        Route::get('', [CategoriesController::class, 'getCategories']);
        Route::post('add-categories', [CategoriesController::class, 'addCategories']);
        Route::delete('{id}', [CategoriesController::class, 'deleteCategories']);
    });
});
