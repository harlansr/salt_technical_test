

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title>@yield('title')</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

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
    {{-- <link href="https://getbootstrap.com/docs/5.0/examples/sign-in/signin.css" rel="stylesheet"> --}}
  </head>
  <body class="text-center">

    <nav class="navbar navbar-dark bg-dark">
      <div class="container-fluid">
        {{-- <div class="container"> --}}
          @if (Auth::user()->name !='')
            <h1  class="navbar-brand mb-0 h1"><b>Hello, {{Auth::user()->name ?? ''}}</b></h1>
          @else
            <h1  class="navbar-brand"><b>Hello, {{Auth::user()->email ?? ''}}</b><br><b>3</b> unpaid order</h1>
          @endif

          <h1><b>3</b> unpaid order</h1>
          
        {{-- </div> --}}

          {{-- <div class="a" href="/prepaid-balance">Prepaid Balance</div> | <div class="/product">Product Page</div> --}}
          <form class="d-flex">
            <button class="btn btn-outline-success me-2" type="button" onclick="document.location='prepaid-balance'">Prepaid Balance</button>
            <button class="btn btn-sm btn-outline-success me-2" type="button" onclick="document.location='product'">Product Page</button>
            <button class="btn btn-sm btn-outline-secondary me-2" type="button" onclick="document.location='logout'">Logout</button>
            {{-- <a href="{{ route('logout') }}">Log Out</a> --}}
          </form>

          

      </div>
    </nav>
    
    @yield('container')
    
  </body>
</html>
