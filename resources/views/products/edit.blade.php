@extends("layout")

@section("sadrzajStranice")

    <form method="POST" action="{{ route("product.save", ['id' => $product->id]) }}">
        {{csrf_field()}}
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{$product->name}}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" class="form-control" id="description" value="{{ $product->description }}">
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" name="amount" class="form-control" id="amount" value="{{ $product->amount }}">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" class="form-control" id="price" value="{{ $product->price }}">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="text" name="image" class="form-control" id="image" value="{{ $product->image }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
