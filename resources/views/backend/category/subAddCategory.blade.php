@extends('layouts.backend_dashboard')
@section('missing')

<div class="row">
    <div class="col-5">
         <div class="card  mt-5">
                <div class="bg-warning">
                        <div class="card-header  mx-auto">
                                Add Sub category
                        </div>
                </div>
   
    <div class="card-body">
        <form action="{{ route('category.sub.store')  }}" method="POST">
          @csrf
          <div class="mt-5">
       
                <input type="text" name="title" class="form-control mt-5 " placeholder="Add Item" value="">
                <input type="text" name="slug" class="form-control mt-5" placeholder="Slug" value="">
                <select name="category_id" id="">
                    @foreach($all_categories as $all_category)
                    <option value="{{$all_category->id}}">{{$all_category->title}}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary mt-5 ">Add Sub category</button>
          
          </div>
                  
        </form>
       
    </div>
 

</div>
<div class="col-7">

    <table class="table">
    <tr class="bg-info">
        <th class="mx-auto">Id</th>
        <th class="mx-auto">category title</th>
        <th class="mx-auto">Slug</th>
        <th class="mx-auto">Action</th>
    </tr>
    @foreach($add_category as $key=>$category)
   
  <tr>
    <td>{{++$key}}</td>
    <td>{{$category->title}}</td>
    <td>{{$category->slug}}</td>
    <td>
        <button class="btn-group">
        <a href="" class="btn btn-success btn-sm">Edit</a>
        <a href="" class="btn btn-danger btn-sm">Delete</a>
        </button>
    </td>
  </tr>
  @endforeach
   </table>


</div>
    </div>
</div>







@endsection