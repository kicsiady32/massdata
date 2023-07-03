@extends('index')
@section('content2')
<div class="content-wrapper">
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Users</h3>
          <div class="box-tools">
          </div>
        </div><!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tr>
              <th>ID</th>
              <th>User</th>
              <th>Roles</th>
              <th>Date</th>
              <th>Actions</th>
            </tr>
            @foreach($users as $user)
            <tr>
              <td>{{$user->id}}</td>
              <td>{{$user->name}}</td>
              <td>{{implode(', ' ,$user->roles()->get()->pluck('name')->toArray())}}</td>
              <td>{{$user->created_at->format('d/m/Y')}}</td>
              <td>
                <a href="{{route('permissionEdit',$user->id)}}"><button class="btn btn-primary">Edit</button></a>
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