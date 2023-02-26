@extends('layouts.backend_dashboard')
@section('missing')
<div class="col-lg-5 mx-auto mt-5">
    <div class="card">
        <div class="card-header">
          Edit Role
            <div class="card-body">
                     <form action="{{route('role.store')}}" method="POST">
                        @csrf
                            <input type="text" class="form-control"name='rolename' value="{{$role->name}}">
                            @error('rolename')
                                <span class="text-danger">
                                    {{$message}}
                                </span>

                            @enderror('rolename')
                            <button class="btn btn-info" style="width: 100%;margin-top:15px;">Update</button>
                      </form>
            </div>
        </div>
    </div>
   
</div>

<form action="" method="POST">
<div class="card">
    <div class="card-header">
       <div class="row">
        <div class="col-lg-8">
        <h5>All Permission</h5>
        </div>
    
        <div class="col-lg-4">
        <button class="btn btn-primary btn-sm">Update</button>
        </div>
      
       </div>
        <div class="card-body">
             
                <div class="row">
                    @foreach($permissions as $permission)
                    <div class="col-md-4" style="margin: 15px 0px;">
                        <input type="checkbox" id="permission_{{$permission->id}}" value="{{$permission->id}}" name="permissions">
                        <label for="permission_{{$permission->id}}">{{$permission->name}}</label>
                    </div>
                    @endforeach
                </div>


        </div>
    </div>
</div>
</form>



@endsection('missing')