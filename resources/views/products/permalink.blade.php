@extends("layout")
@section("sadrzajStranice")
    <p>{{ $product->name }}</p>
    <form method="POST" action="{{ route("cart.add") }}">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $product->id }}">
        <input type="text" name="amount" placeholder="Enter amount">
        <button>Add to cart</button>
    </form>
@endsection()
