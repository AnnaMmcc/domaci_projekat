@extends("layout")

@section("sadrzajStranice")

    <form method="POST" action="{{ route("contact.save", ['id' => $contact->id]) }}">
        {{csrf_field()}}
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{$contact->email}}">
        </div>

        <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" name="subject" class="form-control" id="subject" value="{{ $contact->subject }}">
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <input type="text" name="message" class="form-control" id="message" value="{{ $contact->message }}">
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
