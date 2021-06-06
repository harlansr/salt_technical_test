

@extends('layout.main')
@section('title', 'Home Awal')

@section('container')

    <div class="container mt-4" >
        <main class="form-signin">
        <form method="POST" action="{{route('doPayment')}}">
            {{ csrf_field() }}
            <h2 style="text-align: left; font-weight: bold;">Pay your order</h2>

            <div class="form-floating mt-1">
                <input type="text" name="order_no" class="form-control" id="order_no" value="{{$order_no}}" placeholder="Pleace insert order number" minlength="10" maxlength="10" required>
                <label for="floatingInput" >Order no.</label>
            </div>

            @if ($status == 0)
                <button class="w-100 btn btn-lg btn-primary mt-1" type="submit">Pay now</button>
            @else
                <button class="w-100 btn btn-lg btn-primary mt-1 disabled" type="submit">Pay now</button>
            @endif
            
        </form>
        </main>
    </div>
<br>


@endsection