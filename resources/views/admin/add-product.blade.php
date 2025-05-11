@extends("layout")
@section("sadrzajStranice")
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Product</title>
</head>
<body>
<form method="post" action="/create-product" enctype="multipart/form-data">
    @if($errors->any())
        <p class="text-danger">Greska: {{ $errors->first() }}</p>
    @endif
    {{ csrf_field() }}
      <div class="container col-lg-6">
          <div class="form-group m-3">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name"  placeholder="Unesite ime proizvoda">
          </div>
          <div class="form-group m-3">
              <label for="description">Description</label>
              <input type="text" class="form-control" id="description" name="description"  placeholder="Unesite opis proizvoda">
          </div>
          <div class="form-group m-3">
              <label for="amount">Amount</label>
              <input type="number" class="form-control" id="amount" name="amount"  placeholder="Unesite kolicinu">
          </div>
          <div class="form-group m-3">
              <label for="price">Price</label>
              <input type="number" class="form-control" id="price" name="price"  placeholder="Unesite cenu">
          </div>
          <div class="form-group m-3">
              <label for="image">Unesite sliku proizvoda</label>
              <input type="file" class="form-control" name="image" id="image" placeholder="unesite sliku proizvoda">
          </div>
          <button class="btn btn-primary mt-3">Posalji</button>

      </div>

</form>
</body>
</html>
@endsection


