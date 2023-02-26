<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\addpost;
use App\Models\Category;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class homecontroller extends Controller
{
    public function index(){
            // $categories=Category::with('SubCategory')->get();
            // // dd($categories);


        return view('frontend.home');
    }
    public function searchPost(Request $request)
    {
        $post = addpost::where('title', 'LIKE','%'.$request->search.'%')->get();
        
        return json_encode($post);
    }
}
