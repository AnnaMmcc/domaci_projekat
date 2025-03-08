@extends("layout")

@section("naslovStranice")
    Dashboard
@endsection

@section("sadrzajStranice")

    @if($trenutnoSati >=0 && $trenutnoSati <= 12)
        <p>Dobro jutro</p>
    @else
        <p>Dobar dan</p>

    @endif

    <p class="bg-secondary text-white m-0">Trenutno vreme je {{$trenutnoVreme}}, trenutno sati {{$trenutnoSati}}</p>

    @foreach($newestProducts as $newproduct)
        <p>{{$newproduct->name}}</p>
        <p>{{$newproduct->description}}</p>
        <p>{{$newproduct->price}}</p>
    @endforeach

    <form method="POST" action="/send-contact">
        @if($errors->any())
            <p>Greska: {{ $errors->first() }}</p>
        @endif
        {{ csrf_field() }}
        <input type="email" name="email" id="email" placeholder="Unesite Vas email">
        <input type="text" name="subject" id="subject" placeholder="Unesite naslov">
        <textarea name="description"></textarea>
        <button>Posalji</button>
    </form>


@endsection









