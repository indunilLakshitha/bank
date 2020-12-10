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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('register', 'UserController@register');
Route::post('login', 'UserController@authenticate');
Route::get('open', 'DataController@open');

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('user', 'UserController@getAuthenticatedUser');
    Route::get('closed', 'DataController@closed');

    //Customer data api
    Route::post('customer/manage', 'CustomerController@manageCustomer');
    Route::post('customer/all', 'CustomerController@getAllCustomer');

    //latest transaction details
    Route::post('latest/transactions','LatestTransactionApiController@latestTransactions');
    Route::post('customer/transactions','LatestTransactionApiController@customerTransactions');
    Route::post('today/transactions/{id}','LatestTransactionApiController@todayTransactions');
    Route::post('customer/data','CustomerApiController@viewCustomer');
    Route::post('all/customer','CustomerApiController@viewAllCustomer');


});
