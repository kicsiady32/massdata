@extends('app')
@section('register')
<div class="text-center mb-5">
    <h1>Add new user</h1>
</div>
<form action="{{route('storeNewUser')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Name" value="{{old('name')}}">
        @error('name')
            <div class="text-danger">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp" placeholder="Enter username" value="{{old('username')}}">
        @error('username')
            <div class="text-danger">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
      <label for="email">Email address</label>
      <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{old('email')}}">
      @error('email')
            <div class="text-danger">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" name="password" id="password" placeholder="Password" >
      @error('password')
            <div class="text-danger">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="password_confirmation">Password again</label>
        <input type="password" class="form-control" name="password_confirmation" id="password_conf" placeholder="Repeat your password">
      </div>
    <button type="submit" class="btn btn-primary">Add</button>
  </form>
  
@endsection