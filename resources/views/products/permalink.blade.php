@extends("layout")
@section("naslovStranice")
    {{$product->name}}
@endsection
@section("sadrzajStranice")


    <div class="container">
        <div class="row">
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 mt-2">
                    <div class="card h-100">
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="mt-auto card-text"><strong>{{ $product->price }} din</strong></p>
                            <div>
                                @auth
                                    <form method="POST" action="{{ route('cart.add') }}">
                                        @csrf

                                        <input type="hidden" name="id" value="{{ $product->id }}">

                                        <div class="form-group card-text">
                                            <label for="amount">Amount:</label>
                                            <input type="number" class="form-control" id="amount" name="amount" value="1" min="1" placeholder="Enter amount" required>
                                        </div>

                                        @if(session('error'))
                                            <div class="text-danger">{{ session('error') }}</div>
                                        @endif

                                        <button class="btn btn-primary m-3 card-text">Add to cart</button>
                                    </form>
                                @else
                                    <form method="GET" action="{{ route('cart.guestAdd') }}">
                                        <input type="hidden" name="id" value="{{ $product->id }}">

                                        <div class="form-group card-text">
                                            <label for="amount">Amount:</label>
                                            <input type="number" class="form-control" id="amount" name="amount" value="1" min="1" placeholder="Enter amount" required>
                                        </div>

                                        <input type="hidden" name="redirect" value="{{ request()->fullUrl() }}">

                                        <button class="btn btn-warning m-3 card-text text-white fw-bold">
                                            Додај у корпу
                                        </button>
                                    </form>
                                @endauth

                            </div>
                    </div>
                </div>
        </div>
    </div>


    </div>
@endsection()
