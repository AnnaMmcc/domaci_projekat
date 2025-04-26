@extends("layout")

@section("sadrzajStranice")
    <table class="table table-striped">
        <thead>
        <tr class="col-10">
            <th>Ime proizvoda</th>
            <th>Opis proizvoda</th>
            <th>Kolicina proizvoda</th>
            <th>Cena proizvoda</th>
            <th>Slika proizvoda</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allProducts as $product)

            <tr><td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->amount}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->image}}</td>
             <td>
                 <a href="{{ route('product.delete', ['product' => $product->id]) }}"  class="btn btn-danger">Obrisi</a>
                 <a href="{{route('product.single', ['id'=> $product->id])}}" class="btn btn-primary">Edituj</a>
             </td>
            </tr>

        @endforeach
        </tbody>
    </table>
@endsection
