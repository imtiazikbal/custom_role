<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('role-permissions.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('role-permissions.role.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required', 'string', 'unique:permissions,name',
        ]);
        Role::create([
            'name' => $request->name,
        ]);
        return redirect()->route('roles')->with('status', 'Role created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
       
        return view('role-permissions.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required', 'string', 'unique:permissions,name',
        ]);
        $role->update([
            'name' => $request->name,
        ]);
        return redirect()->route('roles')->with('status', 'Role Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
+     *
+     * @param Role $role The Role to be deleted
+     *
+     * @return RedirectResponse The user will be redirected to the roles page with a message
     */

   public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles')->with('status', 'Role deleted successfully.');
    }
    

    public function givePermission($role)
    {

        $role = Role::findOrFail($role);
        $permissions = Permission::all();
        $rolePermissions = DB::table('role_permissions')->where('role_id', $role->id)->pluck('permission_id')->toArray();
        //return $role_permission;
        return view('role-permissions.role.add-permission', compact('role', 'permissions','rolePermissions'));

    }
    


    public function updatePermission(Request $request, $roleId)
    {
       try{
    //     $request->validate([
    //     'permissions' => 'required|array',
          
    //    ]);

    
        // Find the role by its ID
        $role = Role::findOrFail($roleId);
        $role->permissions()->sync($request->permissions);

       
    
        // Sync permissions to the role
        $role->permissions()->attach($request->permission);
       return redirect()->back()->with('status', 'Permission added to Role successfully.');
       }catch(Exception $e){
        return $e->getMessage();
       }
    
       
    }
}
