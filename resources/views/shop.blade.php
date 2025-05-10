@extends("layout")


@section("naslovStranice")
    Shop
@endsection()

@section("sadrzajStranice")


    <div class="container">
        <div class="row">
            @foreach($products as $product)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 mt-2">
                    <div class="card h-50">
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="mt-auto card-text"><strong>{{ $product->price }} din</strong></p>
                            <a class="btn btn-primary" href="{{ route("products.permalink", ['product' => $product->id]) }}">Pogledaj proizvod</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection()






