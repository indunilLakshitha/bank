<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::with('roles')->get();

        // return $permissions;
        return view('permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('permissions.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        try{

            $permission = Permission::create(['name' => $request->permission_name]);

            foreach($request->roles as $role_name){
                $role = Role::findByName($role_name);
                $role->givePermissionTo($request->permission_name);
            }
            return redirect('/permissions/index')->with('success', 'Permission created successfully');

        } catch(Exception $e){
            return redirect()->back()->with('error', 'Permission already exists');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $perm = Permission::find($id);
        $roles = Role::all();
        $roles_with_this_perm = Permission::where('id',$id)->first()->roles->pluck('name');
        return view('permissions.edit', compact('perm', 'roles_with_this_perm', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $permission = Permission::find($id)->syncRoles($request->roles);

            // foreach($request->roles as $role_name){
            //     $role = Role::findByName($role_name);
            //     $role->givePermissionTo($request->permission_name);
            // }
            return redirect('/permissions/index')->with('success', 'Permission updated successfully');

        } catch(Exception $e){
            return redirect()->back()->with('error', 'A Permission with this name already exists');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        Permission::find($id)->delete();

        return redirect()->back()->with('success', 'Permission removed successfully');
    }
}
