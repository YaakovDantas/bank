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

Route::post('/accounts', 'AccountController@create');
Route::post('/accounts/transaction', 'AccountController@processTransaction');
Route::get('/accounts/historic/{account_number}/{account_code}/{agency}', 'AccountController@history');
Route::get('/accounts/balance/{account_number}/{account_code}/{agency}', 'AccountController@balance');
