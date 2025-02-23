@extends("index")

@section("main")
<div class="container mt-4">
    <h1 class="text-center text-primary mb-4">📚 Your Purchased Books 📚</h1>

    @if(empty($purchases))
        <h3 class="text-center">You haven't bought any books yet!</h3>
        <a href="{{ route('index') }}" class="btn btn-primary d-block mx-auto w-50">Find more Books!</a>
    @else
        <div class="row">
            @foreach ($purchases as $saleId => $books)
                @foreach ($books as $book)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-lg border-0">
                            <div class="card-body">
                                <h5 class="card-title text-primary">{{ $book->title }}</h5>
                                <p class="card-text text-muted">Author: {{ $book->author ?? 'Unknown' }}</p>
                                <p class="card-text">💲 Price: <span class="badge bg-success">{{ number_format($book->price, 2) }}</span></p>
                                <a href="{{ route('index') }}" class="btn btn-primary btn-sm">Find more Books!</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    @endif
</div>
@endsection
