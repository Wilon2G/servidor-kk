

<div class="container py-4">
    <div class="container mt-4">
        <h1 class="text-center text-primary mb-4">📚 Check Out Our Library! 📚</h1>
        @include("message.success")
        @include("message.error")
        <div class="row">
            @foreach ($books as $book)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-lg border-0 h-100">
                        <div class="card-body">
                            <h5 class="card-title text-dark fw-bold">{{ $book->title }}</h5>
                            <p class="card-text text-muted">Autor: {{ $book->author ?? 'Desconocido' }}</p>
                            <p class="card-text">📦 Stock: <span class="badge bg-success">{{ $book->stock }}</span></p>
                            <p class="card-text text-danger fw-bold">💲{{ number_format($book->price, 2) }}</p>

                            <!-- Botón Buy -->
                            <button class="btn btn-primary btn-sm w-100 mb-2">🛒 Buy</button>

                            <!-- Botón Rent con condicional -->
                            @if ($user)
                                @if (in_array($book->id, $user->toArray()))
                                    <a href="{{ route('login') }}" class="btn btn-secondary btn-sm w-100">✅ Already rented!</a>
                                @else
                                    <a href="{{ route('rentBook', ['id' => $book->id]) }}" class="btn btn-warning btn-sm w-100">📖Rent</a>
                                @endif
                            @else
                                <a href="{{ route('login') }}" class="btn btn-secondary btn-sm w-100">🔐 Rent</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>