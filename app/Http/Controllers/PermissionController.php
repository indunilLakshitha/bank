<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    //--------------------------------RETURN TO PERMISSION INDEX VIEW---------------------
    public function index()
    {
        $permissions = Permission::with('roles')->get();

        // return $permissions;
        return view('permissions.index', compact('permissions'));
    }

    //--------------------------------RETURN TO PERMISSION CREATE VIEW---------------------
    public function create()
    {
        $roles = Role::where('status', 1)->get();
        return view('permissions.create', compact('roles'));
    }

    //--------------------------------RETURN TO PERMISSION CREATE VIEW---------------------
    public function store(Request $request)
    {
    //  return $request;
        try{

             $permission = Permission::create(['name' => $request->permission_name,'view_name'=>$request->view_name]);

            foreach($request->roles as $role_name){
                $role = Role::findByName($role_name);
                $role->givePermissionTo($request->permission_name);
            }
            return redirect('/permissions/index')->with('success', 'Permission created successfully');

        } catch(Exception $e){
            return redirect()->back()->with('error', 'Permission already exists');
        }
    }


    public function show(Permission $permission)
    {
        //
    }

    //--------------------------------RETURN TO PERMISSION EDIT VIEW---------------------
    public function edit( $id)
    {
        $perm = Permission::find($id);
        $roles = Role::where('status', 1)->get();
        $roles_with_this_perm = Permission::where('id',$id)->first()->roles->pluck('name');

        return view('permissions.edit', compact('perm', 'roles_with_this_perm', 'roles'));
    }

    //--------------------------------RETURN TO PERMISSION UPDATE VIEW---------------------
    public function update(Request $request, $id)
    {
        try{
            $permission = Permission::find($id)->syncRoles($request->roles);
            $permission->name = $request->permission_name;
            $permission->view_name = $request->view_name;
            $permission->save();

            // foreach($request->roles as $role_name){
            //     $role = Role::findByName($role_name);
            //     $role->givePermissionTo($request->permission_name);
            // }
            return redirect('/permissions/index')->with('success', 'Permission updated successfully');

        } catch(Exception $e){
            return redirect()->back()->with('error', 'A Permission with this name already exists');
        }
    }

    //--------------------------------RETURN TO PERMISSION DELETE VIEW---------------------
    public function destroy( $id)
    {
        //Permission::find($id)->delete();
        $permission = Permission::find($id);
        $permission->status=2;
        $permission->save();
        return redirect()->back()->with('success', 'Permission removed successfully');
    }
}
