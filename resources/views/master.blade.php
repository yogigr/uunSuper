<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name') }} - @yield('title')</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

  <nav class="navbar navbar-inverse" style="border-radius: 0">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>
      </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          
        </ul>
       
        <ul class="nav navbar-nav navbar-right">
          <li class="{{ \Request::segment(1) == 'cart' ? 'active' : '' }}">
            <a href="{{ url('cart') }}">
              <i class="fa fa-shopping-cart">
                <span class="badge label-warning">
                  {{ number_format(Cart::count(), 0, '', '.') }}
                </span>
              </i>
            </a>
          </li>
          @if(Auth::check())
          <li class="dropdown">
            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li>
                <a href="javascript:void(0)"
                onclick="getElementById('logoutForm').submit()">Keluar</a>
              </li>
              <form id="logoutForm" method="post" action="{{ url('logout') }}">
                {{ csrf_field() }}
              </form>
            </ul>
          </li>
          @else
            <li>
              <a href="{{ url('login') }}">
                <i class="fa fa-sign-in"></i> Masuk
              </a>
            </li>
          @endif
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  <div class="container">
    <div class="page-header" style="margin: 0; margin-bottom: 15px">
      <h3 style="margin: 0">@yield('title') <small>@yield('page-description')</small></h3>
    </div>
    <section class="content">
      @yield('content')
    </section>
  </div>

<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')
</body>
</html>