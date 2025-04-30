@extends("layout")
@section("sadrzajStranice")
    @if(session('success'))
        <div class="text-success">{{ session('success') }}</div>
    @endif
 @foreach($combinedItems as $item)
     <p>{{ $item['name'] }}</p>
     <p>Opis: {{ $item['description'] }}</p>
    <p>Kolicina: {{ $item['amount'] }}</p>
    <p>Cena: {{ $item['price'] }}</p>
    <p>Ukupno: {{ $item['total'] }}</p>
 @endforeach

@endsection()
