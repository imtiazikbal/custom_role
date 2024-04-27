<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
     public function index()
    {
        $users = User::with('roles.permissions')->get();
    // return $users;
        
       
      return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles =  Role::all();
        return view('users.create', compact('roles'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required', 'string', 'unique:permissions,name',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password' => 'required','string','min:8',
            'role' => 'required',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->roles()->attach($request->role);
        return redirect()->route('users')->with('status', 'User created successfully.');
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
    public function edit(User $user)
    {
        //return $User;
        $roles =  Role::all();
        $usersRoles = $user->roles->pluck('name')->toArray();
    
        return view('users.edit', compact('user', 'roles', 'usersRoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required', 'string', 'unique:permissions,name',
            
            'role' => 'required',
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);
        $user->roles()->attach($request->role);
        
        return redirect()->route('users')->with('status', 'User Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users')->with('status', 'User deleted successfully.');
    }
}
