@extends('layouts.backend_dashboard')
@push('customcss')
@endpush
@section('missing')

<div class="card"style="margin: 25px 10px;">
    <div class="card-header" style="width: 100%;">Add post</div>
    <div class="card-body">
        <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row"style="margin: 25px 0px;" >
                <input type="text" placeholder="title" name="title" class="form-control">
            </div>
            <div class="row"style="margin: 25px 0px;">
                <select name="category" id="" class="form-control" style="width: 33.33%;">
                @foreach( $categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
                 
                </select>
                <select name="sub_category" id="" class="form-control" style="width: 33.33%;">
                @foreach( $subcategories as $subcategory)
                        <option value="{{$subcategory->id}}">{{$subcategory->title}}</option>
                @endforeach
                 
                </select>
                <select name="option" id="" class="form-control" style="width: 33.33%;">
                    <option value="trending">Trending</option>
                    <option value="hot">Hot topic</option>
                </select>
            </div>
            <div class="row"style="margin: 25px 0px;">
                <label for="">Featured image
<img src="" alt=""><input type="file" name="feature_img" class="form-control"style="margin: 20px 0px;">
                </label>
            </div>
            <div class="editor"style="margin: 25px 0px;">
                <textarea name="editor" id="content" class="form-control" placeholder="Editor or content here"></textarea>
            </div>
            <div class="row" style="margin: 25px 0px;">
                <input type="text" name="hash_tag" class="form-control" placeholder="hash tags">
            </div>
           
            <button class="btn-primary btn" style="margin: 25px 0px; width:100%;">Submit</button>

        </form>
    </div>
</div>


@endsection
@push('customjs')
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create( document.querySelector( '#content' ) )
        .catch( error => {
            console.error( error );
        } );
</script>



@endpush