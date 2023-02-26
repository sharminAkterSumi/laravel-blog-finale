<?php

namespace App\Http\Controllers;

use Spatie\Tags\Tag;
use App\Models\addpost;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class postcontroller extends Controller
{
    public function addpost(){
      $tag = Tag::create(['name' => 'my tag']);
      // dd($tag);
      
        // $addposts=addpost::all();
        $categories=Category::latest()->get();
        $subcategories=SubCategory::latest()->get();
        // dd($addposts);
        return view('backend.post.addpost',compact('categories','subcategories'));
        
    }
    public function store(Request $request)
    {
  
        $addposts=new addpost();
        $addposts->user_id=auth()->user()->id;
        $addposts->category_id=$request->category;
        $addposts->sub_category_id=$request->sub_category;
        $addposts->title=$request->title;
        $addposts->slug=$this->slugGenerator($request->title);
        $addposts->type=$request->option;
        if($request->hasFile('feature_img')){
         $ext=$request->feature_img->extension();
         $filename=$this->slugGenerator($request->title).'.'.$ext;
         $image=$request->feature_img->storeAs('uploads',$filename,'public');
         $addposts->img=$image;
        }
        
        $addposts->textarea=$request->editor;
        // $addposts->hash_tags=$request->hash_tag;
   
        $addposts->save();
        return back();
        
       
      
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
     private function imageupload($request){
      if($request->hasFile('feature_img')){
         $ext=$request->feature_img->extension();
         $filename=$this->slugGenerator($request->title).'.'.$ext;
         $image=$request->feature_img->storeAs('uploads',$filename,'public');
         // $addposts->img=$image;
        }
     }



     public function allPosts()
     {
         $posts = addpost::where('user_id', auth()->user()->id)->get();
         return view('backend.post.allPost',compact('posts'));
     }
 
}
