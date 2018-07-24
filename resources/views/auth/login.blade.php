<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name') }} - Login</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/signin.css') }}" rel="stylesheet">
</head>

<body>

<div class="container">
  <h3 class="text-center"><strong>{{ config('app.name') }}</strong></h3>
  <form class="form-signin" method="post" action="{{ url('login') }}">
    {{ csrf_field() }}
    <h4>Please sign in</h4>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password">
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <br>
    @if($errors->any())
      <div class="alert alert-danger" role="alert">
        <ul>
          @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    
  </form>

</div> <!-- /container -->

</body>
</html>
