<html>
    <head>
    <title> User Login </title>
    @include("header")
    </head>
    <body>
    <div class="container ">
    <h1 class="text-center">Login</h1>

        <div class="row">
            <div class="col-xl-6">
                @if(Session::has("failed"))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times; </button>
                        {{Session::get("failed")}}
                    </div>
                @endif
            </div>
        </div>


    <form class="form-horizontal  action" action="/user-login" method="POST">
        @csrf
    <div class="form-group">
        <label class="control-label" for="email">Email / Phone:</label>
        <div class="col-sm-6">
            <input type="text" name="email_phone" class="form-control input-color" id="email" placeholder="Enter email" name="email">
            {!! $errors->first('email_phone', '<small class="text-white">:message</small>')!!}
        </div>
    </div>

    <h3 class="text-center">Or</h3>
    <div class="form-group">
      <label class="control-label" for="password">Password:</label>
      <div class="col-sm-6">
        <input type="password" class="form-control input-medium bfh-phone input-color" name="password" placeholder="Enter Password">
        {!! $errors->first('password', '<small class="text-white">:message</small>')!!}
      </div>
    </div>

    <h4 class="text-center">Create new account <a href="/register">Register here</a></h4>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
    </div>

    </body>
</html>
