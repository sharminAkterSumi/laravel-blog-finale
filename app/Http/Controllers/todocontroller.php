<?php

namespace App\Http\Controllers;

use App\Models\todo_list;
use Illuminate\Http\Request;

class todocontroller extends Controller
{
    public function todo_list(){
      
        $todo_lists=todo_list::all();
        // dd($todo_lists);
        return view('todo_list',compact('todo_lists'));
        
    }

    public function todo_store(Request $request){
        $todo_lists=new todo_list();
        $todo_lists->title=$request->name;
        $todo_lists->save();
        // return view('todo_list');
        return redirect()->route('list');

    }
    // public function deletelist($id)
    // {
    //    $todo_lists=todo_list::find($id);
    //    $todo_lists->delete();
    //    return view('home');
    // }
}
