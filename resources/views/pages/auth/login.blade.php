@extends ('layouts.plain')

@section ('content')

<div class="col-10 col-sm-8 col-md-6 ml-auto mr-auto mt-5 pt-4 pb-4 border rounded login-container">
  <p class="display-4 text-center text-primary">Welcome to 10thacles</p>
  <hr>
  <div class="text-center">@include('partials.alerts')</div>
  
  <form method="POST" action="{{ url('login') }}">
    {{ csrf_field() }}
    <div class="col-12 col-md-8 ml-auto mr-auto pt-3 pb-3">
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input name="username" required 
          type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input name="password" required 
          type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>
    </div>
    <hr>
    <div class="col-12 col-md-8 ml-auto mr-auto">
      <button type="submit" class="btn btn-primary pl-3 pr-3 float-left">Login</button>
      <a href="#" class="float-right mt-1 text-secondary">Forgot Password</a>
    </div>
  </form>
</div>
@endsection 