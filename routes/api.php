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


Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('register', 'App\Http\Controllers\AuthController@register');  
    
    Route::group(['middleware' => 'auth:api'], function() {

        Route::get('logout', 'App\Http\Controllers\AuthController@logout');
        Route::get('user', 'App\Http\Controllers\AuthController@user');
        // ---------------  RESOURCE ROLES -----------------------------//
        Route::apiResource('rols', 'App\Http\Controllers\RolController');
        // ---------------  RESOURCE MENUS -----------------------------//
        Route::apiResource('menus', 'App\Http\Controllers\MenuController'); 

        // ---------------------------------------------------------------//
        //--------------------  PACIENTES CITADOS   ----------------------//
        //----------------------------------------------------------------// 
        Route::apiResources([
            'citas' => 'App\Http\Controllers\CitaController',
            'antecedentes' => 'App\Http\Controllers\AntecedenteController',
            'cies' => 'App\Http\Controllers\Cie10Controller',
            'actomedicos' => 'App\Http\Controllers\ActoMedicoController',
        ]);     
    });
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
