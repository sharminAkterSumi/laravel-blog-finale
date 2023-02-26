<?php

namespace App\Http\Controllers\frontend;

use App\Models\addpost;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use App\Http\Controllers\Controller;

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



    public function showCategoryPost($slug)
    {

        $category = Category::where('slug', $slug)->first();
        $posts = addpost::where('category_id', $category->id)->with('user')->paginate(10);

        return view('frontend.categoryShow', compact('category', 'posts'));
    }

    public function showSubCategoryPost($slug)
    {
        $category = SubCategory::where('slug', $slug)->first();
        $posts = addpost::where('sub_category_id', $category->id)->with('user')->paginate(10);

      
        return view('frontend.categoryShow', compact('category', 'posts'));
    }


    public function showPost($slug)
    {
        $post = addpost::with(['category', 'user', 'tags'])->where('slug', $slug)->first();
        // dd($post);
        return view('frontend.singleBlog', compact('post'));
    }



}
