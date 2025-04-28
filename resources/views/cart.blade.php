@extends("layout")
@section("sadrzajStranice")
    @if(session('success'))
        <div class="text-success">{{ session('success') }}</div>
    @endif
 @foreach($products as $product)
     <p>{{ $product->name }}</p>
     <p>{{ $product->description }}</p>
     <p>Kolicina: {{ $product->amount }}</p>
     <p>Cena: {{ $product->price }} din</p>
 @endforeach

@endsection()
