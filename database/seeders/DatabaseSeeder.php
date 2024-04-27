<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Imtiaz Ikbal',
            'email' => 'user@gmail.com',
            'password' => Hash::make('12345678'),

        ]);
        User::factory()->create([
            'name' => 'Imtiaz Ikbal',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
        ]);


        
        Role::create([
            'name' => 'admin',
            'description' => 'admin role',
            
        ]);
        Role::create([
            'name' => 'user',
            'description' => 'user role',
            
        ]);

        Permission::create([
           'name' => 'add_user',
           'description' => 'user can add new user',
        ]);
        Permission::create([
            'name' => 'view_user',
            'description' => 'user can view the user information',
         ]);

    }
}
