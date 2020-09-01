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

Route::get('referrals', 'ReferralController@index');
Route::get('referrals/{referral}', 'ReferralController@show');
Route::post('referrals', 'ReferralController@store');

Route::get('users/{user}', 'UserController@show');
Route::get('users', 'UserController@index');






