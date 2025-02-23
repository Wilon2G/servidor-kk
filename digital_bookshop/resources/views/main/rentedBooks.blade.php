@extends("index")

@section("main")
<div class="container mt-4">
    <div class="row">
        @if(sizeof($rentedBooks)===0)
        <h1>You don't have any books yet!</h1>
        <a href="{{route("index")}}">Get some books!</a>

        @else
        @foreach ($rentedBooks as $book)
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg border-0">
                <div class="card-body">
                    <h5 class="card-title text-primary">{{ $book->title }}</h5>
                    <p class="card-text text-muted">Author: {{ $book->author ?? 'Unknown' }}</p>
                    <a href="{{ route('rentedBooks.return',['id'=>$book->id]) }}" class="btn btn-primary btn-sm">Return</a>
                </div>
            </div>
        </div>
    @endforeach

        @endif

    </div>
</div>
@endsection
