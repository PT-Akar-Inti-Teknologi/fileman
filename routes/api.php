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
Route::get('/', function() {
    return response()->json(['message' => 'Selamat datang'], 200);
});

Route::middleware('auth:api')->group(function() {
    Route::get('user', function (Request $request) {
        return response()->json($request->user());
    });
    Route::get('file/download', 'FileController@getFile');
    Route::get('file/remove', 'FileController@removeFile');
    Route::post('file/upload', 'FileController@postFile');
});
