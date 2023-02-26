@extends('layouts.backend_dashboard')
@section('missing')
<!-- <h2 class="bg-info" style="background-color:red; ">hlw</h2> -->
<div class="col-lg-5 mx-auto mt-5">
    <div class="card">
        <div class="card-header">
            Add New Role
            <div class="card-body">
                     <form action="{{route('role.store')}}" method="POST">
                        @csrf
                            <input type="text" class="form-control"name='rolename'>
                            @error('rolename')
                                <span class="text-danger">
                                    {{$message}}
                                </span>

                            @enderror('rolename')
                            <button class="btn btn-info" style="width: 100%;margin-top:15px;">submit</button>
                      </form>
            </div>
        </div>
    </div>
   
</div>


<div class="mt-5">

<table class="table table-responsive">
    <tr>
        <th>#</th>
        <th>Role Name</th>
        <th>Action</th>
    </tr>
    @foreach($roles as $key=>$role)

<tr>
    <td>{{++$key}}</td>
    <td>{{$role->name}}</td>
    <td>
        <a href="{{route('role.edit',$role->id)}}" class="btn btn-primary">Edit</a>
    </td>
</tr>

    @endforeach
</table>

</div>


@endsection('missing')