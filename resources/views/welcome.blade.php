@extends("layout")

@section("naslovStranice")
    Home Page
@endsection

@section("sadrzajStranice")

    <button type="button" class="btn btn-outline-danger m-4">
        @if($trenutnoSati >=0 && $trenutnoSati <= 12)
            <h5 class="text-secondary">Dobro jutro</h5>
        @else
            <p>Dobar dan</p>

        @endif
            <p class="text-secondary">Trenutno vreme je {{$trenutnoVreme}}</p>
    </button>

    <div class="container">
        <div class="row">
            @foreach($newestProducts as $newproduct)
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="card h-100">
                        <img src="{{ asset('storage/' . $newproduct->image) }}" class="card-img-top" alt="{{ $newproduct->name }}">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $newproduct->name }}</h5>
                            <p class="card-text">{{ $newproduct->description }}</p>
                            <p class="mt-auto card-text"><strong>{{ $newproduct->price }} din</strong></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

 <div class="col-lg-5 col-sm-10 m-4">
     <form method="POST" action="/send-contact">
         @if($errors->any())
             <p>Greska: {{ $errors->first() }}</p>
         @endif
         {{ csrf_field() }}

         <div class="form-group">
             <label for="exampleInputEmail1">Email address</label>
             <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
             <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
         </div>

         <div class="form-group">
             <label for="exampleInputEmail1">Subject</label>
             <input type="text" class="form-control" id="subject" name="subject"  placeholder="Enter subject">
         </div>

         <div class="form-group">
             <label for="description">Description</label>
             <input type="text" class="form-control" id="description" name="description"  placeholder="Enter Text/Description">
         </div>
         <button class="btn btn-primary mt-3">Posalji</button>
     </form>

 </div>


@endsection









