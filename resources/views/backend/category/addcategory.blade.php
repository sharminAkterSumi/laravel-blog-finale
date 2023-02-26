@extends('layouts.backend_dashboard')
@section('missing')

<div class="row">
  



   <div class="col-5">
   @if (isset($editedCategory))
        <div class="card">
            <div class="card-header">Edit Category</div>
            <div class="card-body">
                <form action="{{ route('category.update', $editedCategory) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" name="title" class="form-control mt-3 " placeholder="Category Title"
                        value="{{ $editedCategory->title }}">
                    @error('title')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                    <input type="text" name="slug" class="form-control mt-3 mb-3" placeholder="Category Slug" value="">
                    @error('slug')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                    <button class="btn btn-primary">Update Category</button>
                </form>
            </div>
        </div>
        @else
        <div class="card">
            <div class="card-header">Add Category</div>
            <div class="card-body">
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <input type="text" name="title" class="form-control mt-3 " placeholder="Category Title">
                    @error('title')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                    <input type="text" name="slug" class="form-control mt-3 mb-3" placeholder="Category Slug">
                    @error('slug')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                    <button class="btn btn-primary">Add Category</button>
                </form>
            </div>
        </div>
        @endif
 

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
        <a href="{{ route('category.edit', $category) }}" class="btn btn-success btn-sm">Edit</a>
        <form action="{{ route('category.delete', $category) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
        </button>
    </td>
  </tr>


  @if(count($category->subcategories) > 0)
  @foreach($category->subcategories as $sub)
  <tr>
    <td>-></td>
    <td>{{$sub->title}}</td>
    <td>{{$sub->slug}}</td>
    <td>
      <!-- <button class="btn-group">
        <a href="" class="btn btn-success btn-sm">Edit</a>
        <a href="" class="btn btn-danger btn-sm">Delete</a>
      </button> -->
    </td>
  </tr>
  
  @endforeach
  @endif

  @endforeach
   </table>


</div>
    </div>
</div>







@endsection