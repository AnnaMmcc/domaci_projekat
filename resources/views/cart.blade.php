@extends("layout")
@section("sadrzajStranice")
    @if(session('success'))
        <div class="text-success">{{ session('success') }}</div>
    @endif
    <div class="container">
        <div class="row">
              @foreach($combinedItems as $item)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 mt-2">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column">
                            <img src="{{ asset('storage/' . $item['image']) }}" class="card-img-top" alt="{{ $item['name'] }}">
                             <h5 class="card-title">{{ $item['name'] }}</h5>
                             <p class="card-text">Opis: {{ $item['description'] }}</p>
                             <p class="card-text">Kolicina: {{ $item['amount'] }}</p>
                             <p class="card-text">Cena: {{ $item['price'] }}</p>
                             <p class="card-text">Ukupno: {{ $item['total'] }}</p>
                        </div>
                    </div>
                </div>
              @endforeach
        </div>
        <div>
            <h5>Ukupna cena: {{ number_format($totalPrice, 2) }} RSD</h5>
            <a class="btn btn-primary m-3" href="{{route('cart.finish')}}">Zavrsi porudzbinu</a>
        </div>

    </div>
@endsection()

