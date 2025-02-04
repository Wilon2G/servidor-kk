@extends("layout.layout")

@section("content")
<h1>Check out our library!</h1>
<ul>
    @foreach ($books as $book)
        <li>{{ $book->title }} - {{ $book->author }} (Stock: {{ $book->stock }}) --- {{$book->price}}$</li>
    @endforeach
</ul>

@endsection