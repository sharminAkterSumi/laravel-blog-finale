<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class permissionseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        $permissions=[
            'role create',
            'role edit',
            'role status',
            'category create',
            'category edit',
            'category delete',
            'post create',
            'post edit',
            'post delete',
            'user create',
            'user edit',
            'user ban',
        
        
        
        ];
             foreach($permissions as $permission){
            Permission::create(['name' => $permission]);
        }
       
    }
}
