@extends('app')
@section('register')
<div class="text-center mb-5">
    <h1>Login</h1>
</div>
<form action="{{route('login')}}" method="POST">
    @csrf
 
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
      <label for="password">Password</label>
      <input type="password" class="form-control" name="password" id="password" placeholder="Password" >
      @error('password')
            <div class="text-danger">
                {{$message}}
            </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
  </form>
  <br>
  <a href="{{route('/')}}" class="btn btn-primary text-center">You don't have an account? Register!</a> 
  
@endsection