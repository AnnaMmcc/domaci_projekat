@extends("layout")


@section("naslovStranice")
    Shop
@endsection()

@section("sadrzajStranice")
@foreach($products as $product)
    <div>
    <p>{{$product->name}}</p>
<p>{{$product->description}}</p>
        <a class="btn btn-primary" href="{{ route("products.permalink", ['product' => $product->id]) }}">Pogledaj proizvod</a>
    </div>
@endforeach

@endsection()






