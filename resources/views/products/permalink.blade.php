@extends("layout")
@section("sadrzajStranice")
    <p>{{ $product->name }}</p>
    <form method="POST" action="{{ route("cart.add") }}">
        {{ csrf_field() }}
        @if(session('error'))
            <div class="text-danger">{{ session('error') }}</div>
            @endif
        <input type="hidden" name="id" value="{{ $product->id }}">
        <input type="text" name="amount" placeholder="Enter amount">
        <button>Add to cart</button>
    </form>
@endsection()
