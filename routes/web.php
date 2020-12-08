<?php

use App\Models\AccountGeneralInformation;
use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'isBlocked'], function () {

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
                Route::get('chnage_role_status', 'RoleController@chnage_role_status');

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
            Route::get('change_user_status', 'UserController@change_user_status');
        });

        //users/delete
        Route::group(['middleware' => ['permission:delete_users']], function () {
            Route::get('/users/delete/{id}', 'UserController@destroy');
        });

        //perm for member
        // Route::group(['middleware' => ['permission:view_members']], function () {

        //members index
        Route::get('/members', function () {
            return view('members.index');
        })->name('members');
        Route::get('/test', function () {
            return view('members.addX');
            // });

        });
        Route::post('/members/search', 'MemberController@search');
        Route::get('/members/search/data', 'MemberController@search');
        Route::post('/verification/search', 'MemberController@VerificationSearch');
        // Route::group(['middleware' => ['permission:member_add']], function () {
        //members add
        Route::get('/members/add', 'CustomerBasicDataController@add');
        // Route::post('/verification/search', 'MemberController@VerificationSearch');
    });

    // Route::group(['middleware' => ['permission:add_member']], function () {
    //members add
    Route::get('/members/add', 'CustomerBasicDataController@add');
    // });
    Route::group(['middleware' => ['permission:view_member_type']], function () {
        //members typr index
        Route::get('/members/type', function () {
            return view('members.type');
        });
    });
    // });
    //-------------------------------------------------account verification view
    Route::get('/savings/verification', function () {
        $permissions = DB::select("
                SELECT * FROM account_general_information
                LEFT JOIN customer_basic_data
                ON customer_basic_data.customer_id = account_general_information.customer_id
                LEFT JOIN iedentification_types
                ON iedentification_types.id = customer_basic_data.identification_type_id
                WHERE account_general_information.status LIKE '2'
                ");
        return view('savings.verification', compact('permissions'));
    });
    //-------------------------------------------------account approval view(disabled)
    Route::get('/savings/approve', function () {
        return view('savings.approval');
    });
    //savings index
    Route::get('/savings/view', function () {
        $sql = "
                SELECT cbd.`id`, cbd.`customer_id`, cbd.`customer_status_id`, cbd.`full_name`, cbd.`customer_status_id`,
                agi.`status`, cbd.`identification_number`, IF(`member` = 1, 'Member', 'Non Member') AS 'status', agi.`account_number`
                FROM account_general_information AS agi
                INNER JOIN customer_status_dates AS csd ON csd.customer_id = agi.customer_id
                INNER JOIN customer_basic_data AS cbd ON cbd.customer_id = csd.customer_id
                WHERE agi.`status` = 1
                ";
        $user_data = Auth::user();
        if(intval($user_data->roles[0]->id) != 1) {
            $branch_id = $user_data->branh_id;
            $sql .= " AND cbd.branch_id = ". $branch_id;
        }
        $account = DB::select($sql);
        return view('savings.index', compact('account'));
    });
    //-------------------------------------------------------------------------------------new saving account openning-------start
    Route::get('/late', function () {
        $idtypes = DB::table('iedentification_types')->get();
        $CIF = count(DB::table('account_general_information')->get()) + 1;
        $acc_no = 'ACC' . $CIF;
        return view('savings.open_account', compact('idtypes', 'CIF', 'acc_no'));
    });
    Route::get('/savings/open', function () {
        $idtypes = DB::table('iedentification_types')->get();
        // $CIF = count(DB::table('account_general_information')->get()) + 1;
        // $acc_no = 'ACC' . $CIF;
        $acc_count = count(AccountGeneralInformation::all());
        return view('savings.1_client_details', compact('idtypes', 'acc_count'));
    });

    Route::post('/saving/open', 'OpenSavingsAccountController@client_details');
    Route::post('/benificiaries', 'OpenSavingsAccountController@benificiaries');
    Route::post('/product_details', 'OpenSavingsAccountController@product_details');
    Route::post('/create_join_account', 'OpenSavingsAccountController@create_join_account');
    Route::post('/add_mem_join_account', 'OpenSavingsAccountController@add_mem_join_account');
    // Route::post('/guradian-information', 'OpenSavingsAccountController@guradian_information');
    Route::post('/tax_details_view', 'OpenSavingsAccountController@tax_details_view');
    Route::post('/checkout', 'OpenSavingsAccountController@checkout');
    Route::post('/documents', 'OpenSavingsAccountController@getDocs');
    Route::post('/save_documents', 'OpenSavingsAccountController@save_documents');
    Route::post('/tax_details', 'OpenSavingsAccountController@tax_details');
    Route::post('/add_tax', 'OpenSavingsAccountController@add_tax');
    Route::post('/nominee', 'OpenSavingsAccountController@nominee');
    Route::post('/add_nominee', 'OpenSavingsAccountController@add_nominee');
    // Route::post('/autorized_officers', 'OpenSavingsAccountController@autorized_officers');
    // Route::post('/add_officer', 'OpenSavingsAccountController@add_officer');
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
    Route::get('/search_by_full_name', 'OpenSavingsAccountController@search_by_full_name');
    Route::get('/search_by_customer_id', 'OpenSavingsAccountController@search_by_customer_id');
    Route::get('/search_by_customer_id/mem', 'OpenSavingsAccountController@search_by_customer_id_mem');
    Route::get('/search_by_full_name/mem', 'OpenSavingsAccountController@search_by_full_name_mem');
    Route::get('/search_by_full_name/{type}', 'OpenSavingsAccountController@search_by_full_name');
    Route::get('/search_by_customer_id/{type}', 'OpenSavingsAccountController@search_by_customer_id');
    Route::get('/search_by_nic_id/{type}', 'OpenSavingsAccountController@search_by_nic_id');

    Route::get('form/view', 'CustomerController@formView');
    Route::post('form/data', 'CustomerController@formData');

    Route::post('cutomerbasicdata/insert', 'CustomerBasicDataController@insertPrivate');
    Route::post('/member/add/private', 'CustomerBasicDataController@insert');
    Route::post('/member/add/status', 'CustomerBasicDataController@insertStatus');
    Route::post('/member/add/occupation', 'CustomerBasicDataController@insertOccupation');
    Route::post('/member/add/othersociety', 'CustomerBasicDataController@insertOthersociety');
    Route::post('/member/add/benificiaris', 'CustomerBasicDataController@insertBeneficiaries');
    Route::post('/member/add/special-and-assets', 'CustomerBasicDataController@insertSpecialAndAssets');
    Route::post('/add_asset', 'CustomerBasicDataController@add_asset');
    Route::get('/delete_asset', 'CustomerBasicDataController@delete_asset');

    //bebeficiary and guardians
    Route::get('/bene', 'CustomerBasicDataController@beneficiariesAjax');
    Route::get('/guard', 'CustomerBasicDataController@guardianAjax');

    //-------------------------------------------------------------------------------------new saving account openning-------end

    //---------------------------------------------withdrawal views------start
    Route::get('/deposits/n-with', function () {
        return view('deposit.normal_withdrawal');
    });
    Route::get('/deposits/n-dep', function () {
        return view('deposit.normal_deposite');
    });
    Route::get('/deposits/fd-with', function () {
        return view('deposit.fd_withdrawal');
    });
    Route::get('/deposits/fd-dep', function () {
        return view('deposit.fd_deposite');
    });
    //---------------------------------------------withdrawal views------end

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
    Route::get('/savings/getsubdetails', 'SavingsController@getSubDetails');

    // Add by Kanishka 19/11/2020
    Route::get('/savings/parameter', function () {

        return view('savings.savingsAccountParameter');
    });

    Route::get('/savings/schemeParameters', function () {

        return view('savings.InterestSchemeParameters');
    });

    Route::get('/savings/savingsSchemeParameters', function () {

        return view('savings.savingSchemeParameters');
    });

    Route::get('/savings/otherViews', function () {

        return view('savings.otherViews');
    });
    // End

    Route::get('/members/view/{id}', 'CustomerBasicDataController@viewMember');
    Route::get('/members/edit/{id}', 'CustomerBasicDataController@editMember');
    Route::post('/member/edit/1add', 'CustomerBasicDataController@editCustomerBasic');
    Route::post('/member/edit/2status', 'CustomerBasicDataController@editStatus');
    Route::post('/member/edit/3other', 'CustomerBasicDataController@editOccupati');
    Route::post('/member/edit/4membership', 'CustomerBasicDataController@editOthersociety');
    Route::post('/member/edit/5special', 'CustomerBasicDataController@editSpecialAndAssets');
    Route::get('/savings/account/{id}', 'OpenSavingsAccountController@viewSavingAccount');
    Route::get('/members/verify', 'CustomerBasicDataController@memberVerify');
    Route::get('/members/view/check/{id}', 'CustomerBasicDataController@viewVerify');
    Route::get('/members/view/verify/{id}', 'CustomerBasicDataController@verification');
    Route::post('/checknic', 'CustomerBasicDataController@checkNic');

    //-------------------------------------------------------------------------------account verification routes------start
    Route::get('/accountdetails/{id}', 'AccountVerificationController@accountDetails');
    Route::get('/customer_details/{id}', 'AccountVerificationController@customer_details');
    Route::get('/document_verification/{id}', 'AccountVerificationController@document_verification');
    Route::get('/signature_verification/{id}', 'AccountVerificationController@signature_verification');
    Route::get('/verify_image', 'AccountVerificationController@verify_image');
    Route::get('/main_holder_sign', 'AccountVerificationController@main_holder_sign');
    Route::get('/other_holder_sign', 'AccountVerificationController@other_holder_sign');
    Route::get('/approve_check', 'AccountVerificationController@approve_check');
    Route::get('/approve_done', 'AccountVerificationController@approve_done');

    //-------------------------------------------------------------------------------Transactions------start
    Route::get('/findmember', 'TransactionController@findMembers');
    Route::get('/findmemberbyaccno', 'TransactionController@findMembersById');
    Route::get('/normalwithdraw', 'TransactionController@normalWithdraw');
    Route::get('/normaldeposite', 'TransactionController@normalDeposite');

    // ------------------------------------------------------------------------Account Categories------------

    Route::resource('/accountCategory', 'AccountCategoryController');

    // ------------------------------------------------------------------------Account TypeC ------------

    Route::resource('/accountType', 'AccountTypeController');

    // ------------------------------------------------------------------------Account TypeC ------------

    Route::resource('/branches', 'BranchController');

    // ------------------------------------------------------------------------Contact Type------------

    Route::resource('/contactType', 'ContactTypeController');

    // ------------------------------------------------------------------------Currency------------

    Route::resource('/currency', 'CurrencyController');

    // ------------------------------------------------------------------------Customer Status------------

    Route::resource('/cutomerStatus', 'CustomerStatusController');

    // ------------------------------------------------------------------------Customer Status------------

    Route::resource('/cutomerTitle', 'CustomerTitlesController');

    // ------------------------------------------------------------------------Fee Type------------

    Route::resource('/feeType', 'FeeTypeController');

    // ------------------------------------------------------------------------Gender------------

    Route::resource('/gender', 'GenderController');

    // ------------------------------------------------------------------------Identification Type------------

    Route::resource('/idType', 'IdentificationTypeController');

    // ------------------------------------------------------------------------Main Type------------

    Route::resource('/mainType', 'MainTypeController');

    // ------------------------------------------------------------------------Married Status------------

    Route::resource('/marriedStatus', 'MarriedStatusController');

    // ------------------------------------------------------------------------Product Type------------

    Route::resource('/productType', 'ProductTypeController');

    //-------------------------------------------------------------------Savings Schema parameter -------------start--------
    Route::get('/savinsschemacreate', 'SavingsSchemaParameterController@generalSchemaParameters');
    Route::post('/savinsschemasubmit', 'SavingsSchemaParameterController@generalSchemaParametersSave');
    Route::post('/transaction_scheme_params', 'SavingsSchemaParameterController@transaction_scheme_params');
    Route::post('/create_int_schema', 'SavingsSchemaParameterController@create_int_schema');
    Route::post('/create_intereset_type_data', 'SavingsSchemaParameterController@create_intereset_type_data');
    //-------------------------------------------------------------------Savings Schema parameter -------------end--------

    //-------------------------------------------------------------------Interest Schema parameter -------------start--------
    Route::get('/interestschema', 'InterestSchemaParameterController@interestSchema');
    Route::get('/interestschemasubmit/{id}', 'InterestSchemaParameterController@interestSchemaSubmit');
    Route::post('/interestschemafeesubmit', 'InterestSchemaParameterController@interestSchemaFeeSubmit');
    Route::post('/create_fee_data', 'InterestSchemaParameterController@create_fee_data');
    Route::get('/tax_n_docs/{id}', 'InterestSchemaParameterController@tax_n_docs');
    Route::post('/tax_n_docs', 'InterestSchemaParameterController@store_tax_n_docs');
    //-------------------------------------------------------------------Interest Schema parameter -------------end--------

//-----------------------------------------------------------------transaction report----------------------
Route::get('/treport','TransactionReportController@index');
Route::get('/findmemberbyaccnoforreport','TransactionReportController@findMembersById');
Route::get('/creport','TransactionReportController@cashierReport');
Route::get('/cashInHand','TransactionReportController@cashInHand');
Route::get('/ReportOfTransactions','TransactionReportController@reportOfTransactions');
Route::get('/CasHiNhanDbrancH','TransactionReportController@cashInHandBranch');
Route::get('/cashInHand/user','TransactionReportController@getUserRep');
Route::get('/CasHiNhanDbrancH/branch','TransactionReportController@getBranchRep');
Route::get('/ReportOfTransactions/transactions','TransactionReportController@getTransactions');


// -------------------------------------------------------------FD-----------------------------------------

    Route::get('/fdAcCreation', function () {

        return view('deposit.fd_accountCreation');
    });
     Route::get('/fdFindBussPrtn', function () {

        return view('deposit.fd_findBussPartn');
    });
    Route::get('/fdMemCreation', function () {

        return view('deposit.fd_memberCreation');
    });
    Route::get('/fdFindProd', function () {

        return view('deposit.fd_findProd');
    });
    Route::get('/fdFindInter', function () {

        return view('deposit.fd_findInter');
    });
    Route::get('/fdInvestNomi', function () {

        return view('deposit.fd_inv_nom');
    });
    Route::get('/fdNomSlctGrp', function () {

        return view('deposit.fd_nomSlectGrp');
    });
    Route::get('/fdWithdReq', function () {

        return view('deposit.fd_withdrawReq');
    });

    Route::get('/branchCashInOut2', 'BranchCashInOutController@index2');
    Route::get('/branchCashInOut1', 'BranchCashInOutController@index1');

    Route::post('/branchCashInOut1/submit1', 'BranchCashInOutController@submit1');
    Route::post('/branchCashInOut2/submit2', 'BranchCashInOutController@submit2');


    //------------------------------------------------------------------transaction report end-------------------

    //---------------------------------------------------------------------shares---------------------------
    Route::get('/member', 'MemberController@create');
    Route::post('/member_creation', 'MemberController@member_creation');
    Route::get('/add_nominee_member_creation', 'MemberController@add_nominee_member_creation');
    Route::get('/remove_nominee_member_creation', 'MemberController@remove_nominee_member_creation');

Route::get('/sharebuy','ShareController@buyview')->name('shares.buy');
Route::get('/sharetransfer','ShareController@transferview')->name('shares.transfer');
Route::get('/sharetransferdata','ShareController@historyview')->name('shares.history');
Route::post('/buy_shares','ShareController@buy_shares');
Route::post('/transfer_shares','TransactionController@transfer_shares');



//-------------------------------------------------------------branch cash routes---------------------------
Route::get('/branchcash','BranchCashInOutController@index')->name('branch_cash.index');
//--------------------------------------------------------ew main branches-----------------------
Route::get('/newbranches','MainBranchController@index')->name('newbranches.index');
Route::get('/newbranchesadd','MainBranchController@add');
Route::post('/branchesadd','MainBranchController@store');
Route::get('/branchesview/{id}','MainBranchController@view')->name('newbranches.view');
});

//------------------------------------------------------------cashier cash in out --------------------
Route::get('/cashiercash','BranchCashInOutController@index')->name('cashiercash.index');
Route::post('/cashiercashadd','BranchCashInOutController@index')->name('cashiercash.store');

    //------------------------------------------------------------cashier cash in out --------------------
    Route::get('/cashiercash','BranchCashInOutController@index')->name('cashiercash.index');
    Route::post('/cashiercashadd','BranchCashInOutController@index')->name('cashiercash.store');

//----------------------------------------external nominies add -------------
Route::post('/add_external_nominies','ExternalNomimiesController@add');


//----------------------------------------FD account----------------------------
Route::get('/fd','FdAccountController@index');
Route::get('/findproduct','FdAccountController@findProduct');
Route::get('/findproductbyname','FdAccountController@findProductByName');
Route::post('/createfd','FdAccountController@createFd');
Route::get('/findinvester','FdAccountController@findInvester');
Route::get('/addinvester','FdAccountController@addInvester');
Route::get('/findnominee','FdAccountController@findNominee');
Route::get('/addnominee','FdAccountController@addNominee');
Route::get('/findsavingaccounts','FdAccountController@findSavings');
Route::get('/verify','FdAccountController@verify');
Route::get('/fd/view/{id}','FdAccountController@view');
Route::get('/fd/verification/{id}','FdAccountController@verification');
Route::get('/removenominee','FdAccountController@removeNominee');
Route::get('/removeinvestor','FdAccountController@removeInvestor');
Route::get('/findinstructorcfn','FdAccountController@findByFullName');
Route::get('/findinstructorcid','FdAccountController@findByCid');
Route::get('/findinstructornic','FdAccountController@findByNic');

//------------------------------------------------------search model routes-----------
Route::get('/search_by_full_name_for_dnw','SearchController@byNameForWnD');
Route::get('/search_by_cus_id_for_dnw','SearchController@byCustomerIdForWnD');
Route::get('/search_by_nic_for_dnw','SearchController@byNicForWnD');
Auth::routes();
