

@extends('layout.main')
@section('title', 'Home Awal')

@section('container')

    <div class="container mt-4" >
        <main class="form-signin">
        <form method="POST" action="{{route('prepaid-balance')}}">
            {{ csrf_field() }}
            <h2 style="text-align: left; font-weight: bold;">Prepaid Balance</h2>

            <div class="form-floating mt-1">
                <input type="text" name="mobile_number" class="form-control" id="inputName" value="{{old('mobile_number')}}" placeholder="Pleace insert your mobile number" pattern="081+[0-9]{7,12}" minlength="7" maxlength="12" required>
                <label for="floatingInput" >Mobile Number</label>
            </div>
            
            <div class="form-floating mt-1">
                <select class="form-select" name="value" id="value" aria-label="Floating label select example">
                    {{-- <option selected>Open this select menu</option> --}}
                    <option value=10000>10.000</option>
                    <option value=50000>50.000</option>
                    <option value=30000>100.000</option>
                </select>
                <label for="floatingSelect">Value</label>
            </div>


            <button class="w-100 btn btn-lg btn-primary mt-1" type="submit">Submit</button>
        </form>
        </main>
    </div>
<br>


@endsection