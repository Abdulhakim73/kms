<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//auth
Route::post('/login', 'AuthController@login')->name("login")->middleware('throttle:3');
Route::post('user/device', 'AuthController@EnterDevice');

Route::group(['middleware' => 'auth:sanctum', 'cors'], function () {
    Route::middleware(['auth:sanctum', 'check.token.expiration'])->group(function () {
        //logout
        Route::post('/logout', 'AuthController@logout');
        Route::group(['middleware' => 'permission_check'], function () {

            //profile
            Route::post('changePass', 'ProfileController@changePassword');
            //user
            Route::get('user', 'UserController@index');
            Route::get('user/{id}', 'UserController@show');
            Route::post('user/create', 'UserController@store');
            Route::post('user/update/{id}', 'UserController@update');
            Route::delete('user/destroy/{id}', 'UserController@destroy');
            //client
            Route::get('/client', 'ClientController@index');
            Route::get('clientsWithCerts', 'ClientController@clientsWithCerts');
            Route::get('/client/{id}', 'ClientController@show');
            Route::post('/client/create', 'ClientController@store');
            Route::put('/client/update/{id}', 'ClientController@update');
            Route::delete('/client/delete/{id}', 'ClientController@destroy');
            //Request
            Route::get('/request', 'RequestController@index');
            Route::post('/request/create', 'RequestController@store');
            Route::get('/request/update/{id}', 'RequestController@update');
            Route::put('/request/update/status/{id}', 'RequestController@statusUpdate');
            Route::delete('/request/delete/{id}', 'RequestController@destroy');
            //Certificate
            Route::get('/certificate', 'CertificateController@index');
            Route::post('/certificate/create', 'CertificateController@store');
            Route::get('/certificate/{id}', 'CertificateController@show');
            Route::put('/certificate/update/{id}', 'CertificateController@update');
            Route::delete('/certificate/delete/{id}', 'CertificateController@destroy');
            //file
            Route::post('file/create', 'FileController@create');
            // Region (viloyat)
            Route::get('/region', 'RegionController@index');
            Route::post('/region/create', 'RegionController@store');
            Route::get('/region/{id}', 'RegionController@show');
            Route::put('/region/update/{id}', 'RegionController@update');
            Route::delete('/region/delete/{id}', 'RegionController@destroy');
            // district (tuman)
            Route::get('/city', 'CityController@index');
            Route::post('/city/create', 'CityController@store');
            Route::get('/city/{id}', 'CityController@show');
            Route::put('/city/update/{id}', 'CityController@update');
            Route::delete('/city/delete/{id}', 'CityController@destroy');
            Route::get('cityWithRegion/{city_id}', 'CityController@CityWithRegion');
            // Branch
            Route::get('/branch', 'BranchController@index');
            Route::get('/branch/{id}', 'BranchController@show');
            Route::post('/branch/create', 'BranchController@store');
            Route::put('/branch/update/{id}', 'BranchController@update');
            Route::delete('/branch/delete/{id}', 'BranchController@destroy');
            // Role
            Route::get('/role', 'RoleController@index');
            Route::get('/role/{id}', 'RoleController@show');
        });
    });
});
