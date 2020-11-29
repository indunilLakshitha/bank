<?php

namespace App\Http\Controllers;

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
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(compact('token'));
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
        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }

        return response()->json(compact('user'));
    }

    public function index(){
        //$users = User::all()->where('status','<', 2);
        $users = User::leftjoin('branches','branches.id','users.id')
            ->select('users.*','branches.branch_name','branches.branch_code')
            ->where('users.status','<', 2)
            ->get();
        return view('users.index', compact('users'));
    }

    public function create(){

        $roles = Role::with('permissions')->where('status', 1)->get();
        // return $roles;
        $permissions = Permission::all();
        return view('users.create', compact('permissions', 'roles'));
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
            return Redirect::back()->with('message', 'You enter existing email address');
        } if($users_count2 > 0){
            //Session::flash('alert-danger', 'danger');
            return Redirect::back()->with('message', 'You enter existing employee number');
        } elseif($user_password != $user_confirm_password) {
            return Redirect::back()->with('message', 'Your enter password mismatch');
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
        $user->save();

        return redirect('/users/index')->with('success', 'User updated successfully');

    }
}
