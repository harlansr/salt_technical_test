@extends('layout.main')
@section('title', 'Home Awal')

@section('container')

    <div class="container mt-4" >
        <main class="form-signin">
        <form method="POST" action="{{route('register')}}">
            {{ csrf_field() }}
            <h2 style="text-align: left; font-weight: bold;">Order History</h2>

            <div class="form-floating mt-1">
                <input type="text" name="order" class="form-control" id="inputOrder" value="{{old('order')}}" placeholder="Pleace insert order number" required>
                <label for="floatingInput" >Search by Order no.</label>
            </div>

            <table class="table">
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <th>
                                <div class="container">
                                    <div class="row">
                                        <div class="collumn">
                                            <p>{{join(" ", str_split($order->order_no, 4))}}</p>
                                        </div>
                                        <div class="collumn">
                                            <p>Rp {{number_format($order->total ,0,',','.')}}</p>
                                        </div>
                                        
                                    </div>

                                    @if ($order->mobile_number!="")
                                        <p>Rp {{number_format($order->value ,0,',','.')}} for {{$order->mobile_number}}</p>
                                    @else
                                        <p>{{$order->product}} that cost Rp {{number_format($order->value ,0,',','.')}}</p>
                                    @endif
                                    
                                    
                                </div>
                            </th>
                            <th>
                                @if ($order->status==0)
                                    <button type="button" class="btn btn-primary">
                                        Pay Now
                                    </button>
                                @elseif ($order->status==1)
                                    @if ($order->product != null)
                                        <p style="color:black;">shipping code<br>{{$order->shipping_code}}</p>
                                    @else
                                        <p style="color:green;">Success</p>
                                    @endif
                                    
                                @elseif ($order->status==2)
                                    <p style="color:yellow;">Failed</p>
                                @elseif ($order->status==3)
                                    <p style="color:red;">Canceled</p>
                                @endif
                                    
                            </th>
                            {{-- <th>{{$order->order_no}}</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>
                                <button type="button" class="btn btn-primary">
                                    Pay Now
                                </button>
                            </td> --}}
                        </tr>
                    @endforeach
                  
                </tbody>
            </table>
            {{$orders->links()}}

        </form>
        </main>
    </div>
<br>


@endsection