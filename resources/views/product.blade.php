

@extends('layout.main')
@section('title', 'Home Awal')

@section('container')

    <div class="container mt-4" >
        <main class="form-signin">
        <form method="POST" action="{{route('product')}}">
            {{ csrf_field() }}
            <h2 style="text-align: left; font-weight: bold;">Product Page</h2>

            <div class="form-floating mt-1">
                <textarea class="form-control" placeholder="Leave a comment here" name="product" id="product" style="height: 100px" minlength="10" maxlength="150" required></textarea>
                <label for="floatingTextarea2">Product</label>
            </div>

            <div class="form-floating mt-1">
                <textarea class="form-control" placeholder="Leave a comment here" name="address" id="address" style="height: 100px" minlength="10" maxlength="150" required></textarea>
                <label for="floatingInput">Shipping Address</label>
            </div>

            <div class="form-floating mt-1">
                <input type="text" class="form-control" name="price" id="price" pattern="[0-9]+" placeholder="Pleace insert your price" required>
                <label for="floatingInput">Price</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary mt-1" type="submit">Submit</button>
        </form>
        </main>
    </div>
<br>


@endsection