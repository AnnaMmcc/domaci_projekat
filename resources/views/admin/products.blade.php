<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
<table class="table table-striped">
    <thead>
    <tr class="col-10">
        <th>Ime proizvoda</th>
        <th>Opis proizvoda</th>
        <th>Kolicina proizvoda</th>
        <th>Cena proizvoda</th>
        <th>Slika proizvoda</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)

       <tr><td>{{$product->name}}</td>
       <td>{{$product->description}}</td>
      <td>{{$product->amount}}</td>
       <td>{{$product->price}}</td>
       <td>{{$product->image}}</td></tr>

    @endforeach
    </tbody>
</table>
</body>
</html>





