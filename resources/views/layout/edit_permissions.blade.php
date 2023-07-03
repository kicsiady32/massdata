@extends('index')
@section('content2')
<div class="content-wrapper">
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Edit User {{$user->name}}</h3>
          

            <form action="/userPermission/{{$user->id}}" method="POST">
                @csrf
               {{method_field('put')}}
                @foreach($roles as $role)
                <div class="form-check">
                    <input type="checkbox" name="roles[]" value="{{$role->id}}">
                    <label>{{$role->name}}</label>
                </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Update</button>
              </form>
          
        </div><!-- /.box-header -->
        
      </div><!-- /.box -->
    </div>
  </div>
</div>
@endsection