@extends("layout")
@section("sadrzajStranice")
@foreach($cart as $product => $amount)
    {{$product." ".$amount}}
@endforeach
@endsection()
