<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::namespace('Api')->group(function(){
    // Route::get('/test', 'PageController@test');
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');

});
