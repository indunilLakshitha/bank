<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\User;
use Cassandra\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(
                    [
                        'status' => 'failed',
                        'data' => 'invalid_credentials',
                        'token' => null
                    ], 400);
            }
        } catch (JWTException $e) {
            return response()->json(
                [
                    'status' => 'failed',
                    'data' => 'could_not_create_token',
                    'token' => null
                ], 500);
        }

        return response()->json(
            [
                'status' => 'succeed',
                'data' => 'user authenticated successfully',
                'token' => $token
            ]
        );
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'user_type_id' => 'required|integer|max:8',
            'mobile_number' => 'required|string|max:32',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'per_token' => 'required|string|max:255',
        ]);

        if($validator->fails()){
            $data['status'] = 'Failed';
            $data['description'] = 'Data validation failed';
            $data['status_code'] = 400;
            $data['user'] = [];
            $data['token'] = [];
            return response()->json($data, 400);
        }
        if($request->input('per_token') != env('JWT_SECRET')){
            $data['status'] = 'Failed';
            $data['description'] = 'Invalid Token';
            $data['status_code'] = 400;
            $data['user'] = [];
            $data['token'] = [];
            return response()->json($data, 400);
        }
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'user_type_id' => $request->get('user_type_id'),
            'mobile_number' => $request->get('mobile_number'),
            'password' => Hash::make($request->get('password')),
        ]);

        $token = JWTAuth::fromUser($user);
        $data = compact('user','token');
        $data['status'] = 'Succeed';
        $data['description'] = 'User register successfully';
        $data['status_code'] = 201;
        return response()->json($data,201);
    }

    public function getAuthenticatedUser()
    {
        $output = array();
        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

            $output['user_id'] = intval($user->id);
            $output['role_id'] = intval($user->roles[0]->id);
            $output['role_name'] = $user->roles[0]->name;
            $output['is_collector'] = ($user->roles[0]->name == 'Collector') ? 1 : 0;
            $output['user_name'] = $user->name;
            $output['email_address'] = $user->email;
            $output['mobile_number'] = $user->mobile_number;
            $output['employee_number'] = $user->employee_no;
            $output['nic_number'] = $user->nic;
            $output['branch_id'] = intval($user->branh_id);
            $branch = Branch::find($output['branch_id']);
            $output['branch_name'] = $branch->branch_name;
            $output['branch_code'] = $branch->branch_code;
            $output['status'] = intval($user->status);
            $output['created_at'] = date('Y-m-d H:i:s', strtotime($user->created_at));
            $output['updated_at'] = date('Y-m-d H:i:s', strtotime($user->updated_at));



        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(
                [
                    'status' => 'failed',
                    'data' => 'token_expired',
                    'output' => array()
                ], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(
                [
                    'status' => 'failed',
                    'data' => 'token_invalid',
                    'output' => array()
                ], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(
                [
                    'status' => 'failed',
                    'data' => 'token_absent',
                    'output' => array()

                ], $e->getStatusCode());

        }

        return response()->json(
            [
                'status' => 'succeed',
                'data' => 'Login user data pass successfully',
                'output' => $output
            ]
        );
    }

    public function index(){
        $user_data = Auth::user();
        if(intval($user_data->roles[0]->id) != 1) {
            $users = User::leftjoin('branches','branches.id','users.branh_id')
                ->select('users.*','branches.branch_name','branches.branch_code')
                ->where('users.status', '<',2)
                ->where('users.branh_id',Auth::user()->branh_id)
                ->get();
        } else {
            $users = User::leftjoin('branches','branches.id','users.branh_id')
                ->select('users.*','branches.branch_name','branches.branch_code')
                ->where('users.status', '<',2)
                ->get();
        }
        return view('users.index', compact('users'));
    }

    public function create(){

        $roles = Role::with('permissions')->where('status', 1)->get();
        // return $roles;
        $permissions = Permission::all();

        $user_data = Auth::user();
        $default_branch_id = 0;
        if(intval($user_data->roles[0]->id) != 1) {
            $default_branch_id = intval($user_data->branh_id);
        }
        return view('users.create', compact('permissions', 'roles', 'default_branch_id'));
    }

    public function store(Request $request){
        //check employee number existing
        $employee_no = intval($request->input('employee_no'));
        $email_address= $request->input('email');
        $user_password = $request->input('password');
        $user_confirm_password = $request->input('confirm_password');
        $users_count_data1= DB::table('users')
                                ->select(DB::raw('count(*) as user_count'))
                                ->where('email', '=', $email_address)
                                ->get();
        $users_count_data2= DB::table('users')
                                ->select(DB::raw('count(*) as user_count'))
                                ->where('employee_no', '=', $employee_no)
                                ->get();
        $users_count1 = isset($users_count_data1[0]) ? intval($users_count_data1[0]->user_count): 0;
        $users_count2 = isset($users_count_data1[0]) ? intval($users_count_data2[0]->user_count): 0;
       // dd($user_password);
        if($users_count1 > 0){
            //Session::flash('alert-danger', 'danger');
            return Redirect::back()->with('message', 'You entered an existing email address');
        } if($users_count2 > 0){
            //Session::flash('alert-danger', 'danger');
            return Redirect::back()->with('message', 'You entered an existing employee number');
        } elseif($user_password != $user_confirm_password) {
            return Redirect::back()->with('message', 'Password mismatch');
        } else {
            // return $request;
            $user = User::create($request->all());
            $user->password = Hash::make($request->password);
            $user->save();

            $user->syncRoles($request->roles);
            $user->syncPermissions($request->permissions);

            return redirect('/users/index')->with('message', 'User created successfully');
        }
    }

    public function destroy($id){
        //User::find($id)->delete();
        $user = User::find($id);
        $user->status=2;
        $user->save();
        return Redirect::back()->with('success', 'User removed successfully');
    }

    public function edit($id){

        $all_roles = Role::where('status', 1)->get();
        $all_permissions = Permission::all();
        $user = User::find($id);

        // return $user->getRoleNames();

        return view('users.edit', compact('user', 'all_roles', 'all_permissions'));
    }

    public function update(Request $request, $id){
        // return $id;
        $user = User::find($id);
        $user->syncRoles($request->roles);
        $user->syncPermissions($request->permissions);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->mobile_number=$request->mobile_number;
        $user->branh_id=$request->branh_id;
        $user->nic=$request->nic;
        $user->status=$request->status;
        $user->employee_no=$request->employee_no;
        $user->save();

        return redirect('/users/index')->with('message', 'User updated successfully');

    }

    public function change_user_status(Request $request) {
        $user = User::find($request->id);
        $user->status = $request->status;
        $user->save();
        return response()->json($request);
    }
}
