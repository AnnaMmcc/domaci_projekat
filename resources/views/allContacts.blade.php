
@extends("layout")

@section("sadrzajStranice")
    <table class="table table-striped">
        <thead>
        <tr class="col-10">
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allContacts as $contact)

            <tr><td>{{$contact->email}}</td>
                <td>{{$contact->subject}}</td>
                <td>{{$contact->message}}</td>
                <td>
                    <a href="{{route("contact.delete", ['contact' => $contact->id])}}"  class="btn btn-danger">Obrisi</a>
                    <a href="{{ route("contact.edit", ['id' => $contact->id]) }}" class="btn btn-primary">Edituj</a>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
@endsection

