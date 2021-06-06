@extends('layout.main')
@section('title', 'Home Awal')

@section('container')

    <div class="container mt-4" >
        <main class="form-signin">
            {{ csrf_field() }}
            <h2 style="text-align: left; font-weight: bold;">Order History</h2>
            <form class="form-inline my-2 my-lg-0" type="post" action="{{route('order')}}">
                <input class="form-control mr-sm-2" name="query" type="search" placeholder="Search" value="{{$query}}">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
            </form>
            
            
            
            <ul class="list-group">

                
                @foreach ($orders as $order)
                <li class="list-group-item d-flex justify-content-between align-item-center">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">
                            {{join(" ", str_split($order->order_no, 4))}}
                            <span style="padding-left:8em">Rp {{number_format($order->total ,0,',','.')}}</span>
                        </div>
                        @if ($order->mobile_number!="")
                            <p>Rp {{number_format($order->value ,0,',','.')}} for {{$order->mobile_number}}</p>
                        @else
                            <p>{{$order->product}} that cost Rp {{number_format($order->value ,0,',','.')}}</p>
                        @endif
                    </div>
                    
                    

                        
                    <div class="ms-2 d-flex flex-row-reverse" >
                        @if ($order->status==0)
                            <button type="button" onclick="document.location='/payment?order_no={{$order->order_no}}'" class="btn btn-primary" style="height: 50px; width: 100px;">
                                Pay Now
                            </button>
                            {{-- <a href="/payment?order_no={{$order->order_no}}">Pay Now</a> --}}
                        @elseif ($order->status==1)
                            @if ($order->product != null)
                                <p style="color:black; text-align: center;">shipping code<br>{{$order->shipping_code}}</p>
                            @else
                                <p style="color:green;">Success</p>
                            @endif
                            
                        @elseif ($order->status==2)
                            <p style="color:rgb(182, 182, 0);">Failed</p>
                        @elseif ($order->status==3)
                            <p style="color:red;">Canceled</p>
                        @endif
                    </div>
                        
                </li>
                @endforeach
            </ul>
            {{$orders->links()}}

        </main>
    </div>
<br>


@endsection