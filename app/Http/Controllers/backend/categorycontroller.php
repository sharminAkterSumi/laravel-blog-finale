<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SubCategory;

class categorycontroller extends Controller
{
 public  function add(){
   $add_category=Category::with('subcategories')->get();
   // dd($add_category);
    return view('backend.category.addcategory',compact('add_category'));
 }

 public function store(Request $request)
 {
   $add_category=new Category();
   $add_category->title=$request->title;
   $add_category->slug=$this->slugGenerator($request->title, $request->slug);
   $add_category->save();
  //  dd($add_category->slug);
   return redirect()->route('category.add');
 }

 private  function slugGenerator($name, $slug = null){
   if(!$slug){
      $newSlug  = str()->slug($name);
   }else{
      $newSlug= str()->slug($slug);
   }
   $count = Category::where('slug', 'LIKE', '%'.$newSlug.'%')->count();
   if($count > 0){
      $newSlug = $newSlug . '-'.$count++;
   }

   return $newSlug;

}





/***
 * SUB CATEGORY STARTS HERE 
 */

 public function subAdd()
 {
   $add_category = SubCategory::all();
   $all_categories=Category::select('id','title')->get();
   
   return view('backend.category.subAddCategory',compact('add_category','all_categories'));
 }


 public function storeSub(Request $request)
 {
   $add_category=new SubCategory();
   $add_category->title=$request->title;
   $add_category->slug=$this->slugGenerator($request->title, $request->slug);
   $add_category->category_id = $request->category_id;
   $add_category->save();
   // dd($add_category->slug);
   return redirect()->route('category.sub.add');
 }












}
