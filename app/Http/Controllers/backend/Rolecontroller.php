<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\Unique;
use Spatie\Permission\Models\Permission;

class Rolecontroller extends Controller
{
    public function add()
    {
        $roles=Role::where('name','!=','admin')->get();
      return view('backend.Roles.Addroles',compact('roles'));
    }
    public function storerole(Request $request)
    {
        $request->validate([
            'rolename'=>'Unique:roles,name'
        ]);
        $role = Role::create(['name' =>$request->rolename]);
       return back();
    }
    public function editrole($id)
    {
        $role=Role::find($id);
        $permissions=Permission::get();
      return view('backend.Roles.editrole',compact('role','permissions'));
    }
}
