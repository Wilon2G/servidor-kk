@extends("index")

@section("main")
<div class="container py-4">
        <div class="container mt-4">
            <h1 class="text-center text-primary mb-4">📚 Check Out Our Library! 📚</h1>
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
                                @if ($customer)
                                    <!-- Si el usuario ya ha alquilado el libro -->
                                    @if (in_array($book->id, $customer))
                                        <a href="{{ route('userBooks') }}" class="btn btn-success btn-sm w-100 mb-2">✅ Already
                                            rented!</a>
                                    @else
                                        <!-- Si el usuario puede alquilar el libro -->
                                        <a href="{{ route('rentBook', ['id' => $book->id]) }}"
                                            class="btn btn-warning btn-sm w-100 mb-2">📖 Rent</a>
                                    @endif

                                    <!-- Si el usuario es premium, permite eliminar el libro -->
                                    @if (session('customer_type') === "premium")
                                        <a href="{{ route('book.delete',['id' => $book->id]) }}" class="btn btn-danger btn-sm w-100">💔 Delete Book</a>
                                    @endif
                                @else
                                    <!-- Si el usuario no está autenticado, muestra el botón de login -->
                                    <a href="{{ route('login') }}" class="btn btn-secondary btn-sm w-100">🔐 Rent</a>
                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection