@extends("layout")

@section("naslovStranice")
   Contact
@endsection

@section("sadrzajStranice")
    <div class="container d-flex justify-center flex-column align-items-center">
    <form method="POST" action="{{route("Send.Contact")}}">
        {{csrf_field()}}
        <div class="row d-flex">
            <label for="email" class="col-form-label">Email:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email">
            </div>
        </div>
        <div class="row d-flex">
            <label for="subject" class=" col-form-label col-sm-10">Subject:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="subject" name="subject">
            </div>
        </div>
        <div class="row-flex">
            <label for="message" class="col-form-label">Message:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="message" name="message">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mb-3 mt-3">Submit</button>
        @if($errors->any)
            <div class="text-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
    <div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d362281.9647671883!2d20.092828322194542!3d44.814885177880136!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a7aa3d7b53fbd%3A0x1db8645cf2177ee4!2z0JHQtdC-0LPRgNCw0LQ!5e0!3m2!1ssr!2srs!4v1739351867618!5m2!1ssr!2srs" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    </div>
@endsection



