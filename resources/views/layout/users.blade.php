@extends('index')

@section('content2')

<div class="content-wrapper">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Users</h3> <br>
          <a href="{{route('addNewUser')}}" class="btn btn-success">Add a new user</a>
          <div class="box-tools">
          </div>
        </div><!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tr>
              <th>ID</th>
              <th>User</th>
              <th>Date</th>
              <th>Actions</th>
            </tr>
            @foreach($users as $user)
            <tr>
              <td>{{$user->id}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->created_at->format('d/m/Y')}}</td>
              <td>
                <a href="{{route('usersEdit',$user->id)}}"><button class="btn btn-primary">Edit</button></a>
                <form action="{{route('usersDelete',$user)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit"  class="btn btn-danger">Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
  </div>
</div>
@endsection