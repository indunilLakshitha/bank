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

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

Route::get('/', function () {
    // factory(\App\User::class, 3)->create();
    // return auth()->user()->roles;
    return redirect()->route('login');

    // SELECT * FROM customer_basic_data
    //     WHERE  name_in_use IS NULL OR name_in_use LIKE '%$name_in_use%'
    //     or customer_id IS NULL OR customer_id LIKE '%$customer_id%'

    $name_in_use = null;
    $customer_id = 'U1CBD3';
    return $results = DB::select("
        SELECT * FROM customer_basic_data
        WHERE  name_in_use LIKE '%$name_in_use%'
        or customer_id LIKE '%$customer_id%'
    ");
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

    //users/edit
    Route::group(['middleware' => ['permission:update_users']], function () {
        Route::get('/users/edit/{id}', 'UserController@edit');
        Route::post('/users/update/{id}', 'UserController@update');
    });

    //users/delete
    Route::group(['middleware' => ['permission:delete_users']], function () {
        Route::get('/users/delete/{id}', 'UserController@destroy');
    });


        //perm for member
        // Route::group(['middleware' => ['permission:view_members']], function () {

        //members index
        Route::get('/members', function(){
            return view('members.index');
        });
        Route::get('/test', function(){
            return view('members.addX');
        });
        Route::post('/members/search', 'MemberController@search');
    // });
        // Route::group(['middleware' => ['permission:member_add']], function () {
        //members add
        Route::get('/members/add','CustomerBasicDataController@add');
    // });
        Route::group(['middleware' => ['permission:view_member_type']], function () {
        //members typr index
        Route::get('/members/type', function(){
            return view('members.type');
        });

    });

});
Route::get('/savings/verification', function(){
    return view('savings.verification');
});
Route::get('/savings/approve', function(){
    return view('savings.approval');
});


Route::get('/late', function(){
    $idtypes = DB::table('iedentification_types')->get();
    $CIF = count(DB::table('account_general_information')->get())+1;
    $acc_no = 'ACC'.$CIF;
    return view('savings.open_account', compact('idtypes', 'CIF', 'acc_no'));
});
Route::get('/savings/open', function(){
    $idtypes = DB::table('iedentification_types')->get();
    $CIF = count(DB::table('account_general_information')->get())+1;
    $acc_no = 'ACC'.$CIF;
    return view('savings.1_client_details', compact('idtypes', 'CIF', 'acc_no'));
});

Route::post('/savings/open', 'OpenSavingsAccountController@client_details');
Route::post('/product_details', 'OpenSavingsAccountController@product_details');
Route::post('/create_join_account', 'OpenSavingsAccountController@create_join_account');
Route::post('/add_mem_join_account', 'OpenSavingsAccountController@add_mem_join_account');
Route::post('/guradian-information', 'OpenSavingsAccountController@guradian_information');
Route::post('/documents', 'OpenSavingsAccountController@getDocs');
Route::post('/save_documents', 'OpenSavingsAccountController@save_documents');
Route::post('/tax_details', 'OpenSavingsAccountController@tax_details');
Route::post('/add_tax', 'OpenSavingsAccountController@add_tax');
Route::post('/nominee', 'OpenSavingsAccountController@nominee');
Route::post('/add_nominee', 'OpenSavingsAccountController@add_nominee');
Route::post('/autorized_officers', 'OpenSavingsAccountController@autorized_officers');
Route::post('/add_officer', 'OpenSavingsAccountController@add_officer');
Route::post('/finish_open_account_saving', 'OpenSavingsAccountController@finish_open_account_saving');

// Route::get('/open-savings/client_details', function(){
//     return view('savings.1_client_details');
// });

//open savings account form ajax
Route::get('/get_cus_details', 'OpenSavingsAccountController@get_cus_details');
Route::get('/get_cus_details_by_name', 'OpenSavingsAccountController@get_cus_details_by_name');
Route::get('/get_guardian', 'OpenSavingsAccountController@get_guardian');
Route::post('/submit_all', 'OpenSavingsAccountController@submitAll');
Route::get('/search_by_name', 'OpenSavingsAccountController@search_by_name');

Route::get('form/view', 'CustomerController@formView');
Route::post('form/data', 'CustomerController@formData');

Route::post('cutomerbasicdata/insert', 'CustomerBasicDataController@insertPrivate');
Route::post('/member/add/private', 'CustomerBasicDataController@insert');
Route::post('/member/add/status', 'CustomerBasicDataController@insertStatus');
Route::post('/member/add/occupation', 'CustomerBasicDataController@insertOccupation');
Route::post('/member/add/othersociety', 'CustomerBasicDataController@insertOthersociety');
Route::post('/member/add/benificiaris', 'CustomerBasicDataController@insertBeneficiaries');
Route::post('/member/add/special-and-assets', 'CustomerBasicDataController@insertSpecialAndAssets');

//bebeficiary and guardians
Route::get('/bene', 'CustomerBasicDataController@beneficiariesAjax');
Route::get('/guard', 'CustomerBasicDataController@guardianAjax');

// KTA Start
Route::get('/deposits/n-with', function(){
    return view('deposit.normal_withdrawal');
});
Route::get('/deposits/n-dep', function(){
    return view('deposit.normal_deposite');
});
Route::get('/deposits/fd-with', function(){
    return view('deposit.fd_withdrawal');
});
Route::get('/deposits/fd-dep', function(){
    return view('deposit.fd_deposite');
});
Route::get('/savings/clientdetails', 'SavingsController@clientDetails');
Route::get('/savings/generalinformation', 'SavingsController@generalInformation');
Route::get('/savings/productdetails', 'SavingsController@productDetails');
Route::get('/savings/jointacoount', 'SavingsController@jointAcoount');
Route::get('/savings/operatinginstrictions', 'SavingsController@operatingInstrictions');
Route::get('/savings/guardianinformation', 'SavingsController@guardianInformation');
Route::get('/savings/documents', 'SavingsController@documents');
Route::get('/savings/taxdetails', 'SavingsController@taxDetails');
Route::get('/savings/nomineeinstruction', 'SavingsController@nomineeInstruction');
Route::get('/savings/correspondance', 'SavingsController@correspondance');
Route::get('/savings/authorizedofficer', 'SavingsController@authorizedOfficer');
Route::get('/members/view/{id}', 'CustomerBasicDataController@viewMember');



// KTA End




Auth::routes();
