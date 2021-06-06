

@extends('layout.main')
@section('title', 'Home Awal')

@section('container')

    <div class="container mt-4" >
        <main class="form-signin">
        <form method="POST" action="{{route('payment')}}">
            {{ csrf_field() }}
            <h2 style="text-align: left; font-weight: bold;">Success!</h2>

            <div class="container-fluid">
                <table class="table table-borderless" >
                    <tr>
                        <td style="text-align: left;">Order no.</td>
                        <td style="text-align: right;">{{join(" ", str_split($order_no, 4))}}</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Total</td>
                        <td style="text-align: right;">Rp {{number_format($total,0,',','.')}}</td>
                    </tr>
                </table>
            </div>

            

            <div class="container">
                <div class="form-floating mt-1">
                    @if ($mobile_number == '')
                        <a>{{$product_name}} that costs Rp {{number_format($value,0,',','.')}} will be shipped to : <br>{{$address}} <br>only after you pay</a>
                    @else
                        <a>Your mobile phone number {{$mobile_number}} will receive Rp {{number_format($value,0,',','.')}}</a>
                    @endif
                    
                </div>
            </div>
            
            <input type="hidden" name="order_no" id="order_no" value="{{$order_no}}">
            <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Pay now</button>
        </form>
        </main>
    </div>
<br>


@endsection