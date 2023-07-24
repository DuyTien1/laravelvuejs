<?php

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/', function () {
    return view('welcome');
});

Route::post('login', 'LoginController@login');
Route::namespace('api')->group(function() {
    Route::apiResource('user', 'UserController')->except('create', 'edit');
    Route::apiResource('role', 'RoleController')->except('create', 'edit');
    Route::apiResource('story', 'StoryController')->except('create', 'edit');
    Route::apiResource('category', 'CategoryController')->except('create', 'edit');
    Route::apiResource('categorydetail', 'CategoryDetailController')->except('create', 'edit');
    Route::apiResource('chapter', 'ChapterController')->except('create', 'edit');
    Route::apiResource('comment', 'CommentController')->except('create', 'edit');
});
