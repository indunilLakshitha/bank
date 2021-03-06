<?php

namespace App\Http\Controllers;

use Exception;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //--------------------------------RETURN TO ROLES INDEX VIEW---------------------
    public function index()
    {
        // return 123;
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    //--------------------------------RETURN TO ROLES CREATE VIEW---------------------
    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    //--------------------------------ROLES CREATE ---------------------
    public function store(Request $request)
    {
        // return $request->permissions;
        try{

            $role = Role::create(['name' => $request->role_name]);

            $role->syncPermissions($request->permissions);
            return redirect('/roles/index')->with('success', 'Role created successfully');

        } catch(Exception $e){
            return redirect()->back()->with('error', 'Role already exists');
        }


    }


    public function show($id)
    {

    }

    //--------------------------------RETURN TO ROLES EDIT VIEW---------------------
    public function edit($id)
    {
        $role = Role::find($id);
        $all_permissions = Permission::all();
        $this_role_permissions = Role::find($id)->permissions;  #this works and comes with the pivot table
        // return $permissions;

        return view('roles.edit', compact('all_permissions', 'this_role_permissions', 'role'));
    }

    //--------------------------------RETURN TO ROLES UPDATE VIEW---------------------
    public function update(Request $request, $id)
    {
        try{
            $role = Role::find($id);

            $role->syncPermissions($request->permissions);
            $role->name = $request->role_name;
            $role->save();
            return redirect('/roles/index')->with('success', 'Role updated successfully');

        } catch(Exception $e){
            return redirect()->back()->with('error', 'A Role with this name already exists');
        }
    }

    //--------------------------------RETURN TO ROLES DELETE VIEW---------------------
    public function destroy($id)
    {

        $role = Role::find($id);
        $role->delete();

        return redirect()->back()->with('success', 'Role removed successfully');
    }
}
