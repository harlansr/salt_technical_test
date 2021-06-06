@extends('layout.auth')
@section('title', 'Register')

@section('container')

  <div class="container" >
    <main class="form-signin">
      <form method="POST" action="{{route('register')}}">
        {{ csrf_field() }}
        <h2 style="text-align: left; font-weight: bold;">Register</h2>

        <div class="form-floating mt-1">
            <input type="text" name="name" class="form-control" id="inputName" value="{{old('name')}}" placeholder="Pleace insert your name">
            <label for="floatingInput">Name</label>
          </div>
        <div class="form-floating mt-1">
          <input type="text" name="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" id="floatingInput" value="{{old('email')}}" placeholder="e-mail" pattern="[a-z0-9._%+-]+@+[a-z0-9.-]+\.[a-z]{2,}$" required>
          <label for="floatingInput">Email address</label>
          @if ($errors->has('email'))
            <div class="invalid-feedback">
                {{$errors->first('email')}}
            </div>
          @endif
        </div>

        <div class="form-floating mt-1">
          <input type="password" name='password' class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" id="floatingPassword" placeholder="Password" minlength="6" required>
          <label for="floatingPassword">Password</label>
          @if ($errors->has('password'))
            <div class="invalid-feedback">
                {{$errors->first('password')}}
            </div>
          @endif
        </div>

        <button class="w-100 btn btn-lg btn-primary mt-1" type="submit">Register</button>
        <br><br><a href="{{url('/login')}}">Login</a>
      </form>
    </main>
  </div>

@endsection