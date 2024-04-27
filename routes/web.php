<?php

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermissionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
  // $admin = User::where('name', 'admin')->with('roles')->first();
//    $admin_role = Role::where('name', 'admin')->first();
//    $admin->roles()->attach($admin_role);
//    dd($admin->toArray());

    $admin_permission = Permission::where('name', 'add_user')->first();
    $admin = Role::where('name', 'admin')->first();

//$admin->permissions()->attach($admin_permission);
    dd($admin->permissions());

});






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::controller(PermissionController::class)->group(function () {
    Route::get('/permissions', 'index')->name('permissions');
    Route::get('/permissions/create', 'create')->name('permissions.create');
    Route::post('/permissions/store', 'store')->name('permissions.store');
    Route::get('/permissions/edit/{permission}', 'edit')->name('permissions.edit');
    Route::post('/permissions/update/{permission}', 'update')->name('permissions.update');
    Route::get('/permissions/delete/{permission}', 'destroy')->name('permissions.delete');
});



Route::controller(RoleController::class)->group(function () {
    Route::get('/roles', 'index')->name('roles');
    Route::get('/roles/create', 'create')->name('roles.create');
    Route::post('/roles/store', 'store')->name('roles.store');
    Route::get('/roles/edit/{role}', 'edit')->name('roles.edit');
    Route::post('/roles/update/{role}', 'update')->name('roles.update');
    Route::get('/roles/delete/{role}', 'destroy')->name('roles.delete');


    // give permission to role
    Route::get('/roles/give-permission/{role}', 'givePermission')->name('roles.give-permission');
    Route::post('/roles/givee-permission/{role}', 'updatePermission')->name('roles.update-permission');
});



Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index')->name('users');
    Route::get('/users/create', 'create')->name('users.create');
    Route::post('/users/store', 'store')->name('users.store');
    Route::get('/users/edit/{user}', 'edit')->name('users.edit');
    Route::post('/users/update/{user}', 'update')->name('users.update');
    Route::get('/users/delete/{user}', 'destroy')->name('users.delete');
});


require __DIR__.'/auth.php';
