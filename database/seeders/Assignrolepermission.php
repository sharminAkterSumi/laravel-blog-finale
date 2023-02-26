<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


use Spatie\Permission\Models\Permission;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Assignrolepermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user=User::first();
       $user->assignRole('Admin');

       $permissions=Permission::get();
       $adminRole=Role::where('name','admin')->first();
       $adminRole->syncPermissions($permissions);
       
    }
}
