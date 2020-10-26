<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

Route::get('/', function () {
    // factory(\App\User::class, 3)->create();
    // return auth()->user()->roles;
    return redirect()->route('login');
});

// Route::get('/assignrole', function () {
//     // Auth::user()->assignRole('viewer');
//     // Auth::user()->givePermissionTo('view_roles');
//     return 'role assigned';
// });


Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', 'DashboardController@index');

    //perm for roles
    Route::group(['middleware' => ['permission:view_roles']], function () {

        //roles/index
        Route::get('/roles/index', 'RoleController@index');

        //roles/add
        Route::group(['middleware' => ['permission:create_roles']], function () {
            Route::get('/roles/add', 'RoleController@create');
            Route::post('/roles/store', 'RoleController@store');
        });

        //roles/delete
        Route::group(['middleware' => ['permission:delete_roles']], function () {
            Route::get('/roles/delete/{id}', 'RoleController@destroy');
        });

        //roles/edit
        Route::group(['middleware' => ['permission:update_roles']], function () {
            Route::get('/roles/edit/{id}', 'RoleController@edit');
            Route::post('/roles/update/{id}', 'RoleController@update');
        });
    });

    //perm for perms
    Route::group(['middleware' => ['permission:view_permissions']], function () {
        //perms/index
        Route::get('/permissions/index', 'PermissionController@index');

        //permissions/add
        Route::group(['middleware' => ['permission:create_permissions']], function () {
            Route::get('/permissions/add', 'PermissionController@create');
            Route::post('/permissions/store', 'PermissionController@store');
        });

         //permissions/edit
         Route::group(['middleware' => ['permission:update_permissions']], function () {
            Route::get('/permissions/edit/{id}', 'PermissionController@edit');
            Route::post('/permissions/update/{id}', 'PermissionController@update');
        });

        //permissions/delete
        Route::group(['middleware' => ['permission:delete_permissions']], function () {
            Route::get('/permissions/delete/{id}', 'PermissionController@destroy');
        });
    });

    #view all users
    Route::get('/users/index', 'UserController@index');

    //users/add
    Route::group(['middleware' => ['permission:create_users']], function () {
        Route::get('/users/add', 'UserController@create');
        Route::post('/users/store', 'UserController@store');
    });

    //permissions/edit
    Route::group(['middleware' => ['permission:update_permissions']], function () {
        Route::get('/permissions/edit/{id}', 'PermissionController@edit');
        Route::post('/permissions/update/{id}', 'PermissionController@update');
    });
    
});
Route::get('form/view', 'CustomerController@formView');
Route::post('form/data', 'CustomerController@formData');

Auth::routes();
