<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>User Registration </title>
        @include("header")

    </head>
    <body>
<div class="container">
  <h1>Registration form</h1>

    <div class="row">
        <div class="col-xl-6 col-lg-6">
            @if(Session::has('success'))
                <div class='alert alert-success alert-dismissible'>
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ Session::get("success")}}
                </div>

            @elseif(Session::has('failed'))
                <div class='alert alert-danger alert-dismissible'>
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ Session::get("failed")}}
                </div>

            @endif
        </div>
    </div>

    <!-- --------start--------- -->
        
    <!-- --------end--------- -->

    <form class="form-horizontal  action" action="{{url('user-register')}}" method="POST">
  @csrf
    <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name:</label>
      <div class="col-sm-6">
        <input type="Name" class="form-control input-color" id="name" placeholder="Enter Name" name="name" value="{{old('name')}}">
        {!! $errors->first('name', '<small class="text-white">:message</small>')!!}
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-6">
        <input type="email" class="form-control input-color" id="email" placeholder="Enter email" name="email" value="{{old('email')}}">
        {!! $errors->first('email', '<small class="text-white">:message</small>')!!}
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="mobile">Mobile Number:</label>
      <div class="col-sm-6">
        <input type="phone" maxlength="10" class="form-control input-medium bfh-phone input-color" name="phone" placeholder="Enter Mobile Number" value="{{old('phone')}}">
        {!! $errors->first('phone', '<small class="text-white">:message</small>')!!}
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="address">Address:</label>
      <div class="col-sm-6">
        <input type="text" class="form-control input-color" id="address" placeholder="Enter Address" name="address" value="{{old('address')}}">
        {!! $errors->first('address', '<small class="text-white">:message</small>')!!}
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-6">
        <input type="password" class="form-control input-color" id="pwd" placeholder="Enter password" name="password" value="{{old('password')}}">
        {!! $errors->first('password', '<small class="text-white">:message</small>')!!}
      </div>
    </div>

    <h4 class="text-center">Have already an account ? <a href="{{url('/login')}}">Login here</a></h4>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-outline-primary btn-lg">Register</button>
      </div>
    </div>

  </form>
</div>

    </body>
</html>
