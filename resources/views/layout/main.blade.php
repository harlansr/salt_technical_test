
<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title>@yield('title')</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sticky-footer-navbar/">

    

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Favicons -->
{{-- <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3"> --}}


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/5.0/examples/sticky-footer-navbar/sticky-footer-navbar.css" rel="stylesheet">
  </head>
  <body class="d-flex flex-column h-100">
    
    <header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            @if (Auth::user()->name !='')
              <h1  class="navbar-brand mb-0 h1"><b>Hello, {{Auth::user()->name ?? ''}}</b><br><a class="text-danger" href="{{url('/order')}}">{{$unpaid}}</a> unpaid order</h1>
            @else
              <h1  class="navbar-brand"><b>Hello, {{Auth::user()->email ?? ''}}</b><br><a class="text-danger" href="/order">{{$unpaid}}</a> unpaid order</h1>
            @endif
  
            <form class="d-flex">
              <button class="btn btn-outline-success me-2" type="button" onclick="document.location='prepaid-balance'">Prepaid Balance</button>
              <button class="btn btn-sm btn-outline-success me-2" type="button" onclick="document.location='product'">Product Page</button>
              <button class="btn btn-sm btn-outline-secondary me-2" type="button" onclick="document.location='logout'">Logout</button>
            </form>
  
            
  
        </div>
      </nav>
    </header>

    <!-- Begin page content -->
    @yield('container')

    <script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

      
  </body>
</html>
