@if ($menu==3)
<div class="container mt-4">
        <div class="row">
            @foreach ($userBooks as $book)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-lg border-0">
                        <div class="card-body">
                            <h5 class="card-title text-primary">{{ $book->title }}</h5>
                            <p class="card-text text-muted">Autor: {{ $book->author ?? 'Desconocido' }}</p>
                            <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm">More Books!</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif