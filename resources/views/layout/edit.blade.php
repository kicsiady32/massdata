@extends('index')
@section('content2')
<div class="content-wrapper">
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Edit User {{$user->name}}</h3>
          

            <form action="/users/{{$user->id}}" method="POST">
                @csrf
               {{method_field('put')}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp"  value="{{$user->name}}">
                    @error('name')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp" placeholder="Enter username" value="{{$user->username}}">
                    @error('username')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{$user->email}}">
                  @error('email')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
              </form>
          
        </div><!-- /.box-header -->
        
      </div><!-- /.box -->
    </div>
  </div>
</div>
@endsection