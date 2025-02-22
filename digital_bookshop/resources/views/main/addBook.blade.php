@extends("index")

@section("main")
<div class="container mt-4">

    <h2 class="mb-4">Adding tool</h2>
    <p class="lead">Here you can add new books!</p>

    <!-- Formulario de agregar libro -->
    <form action={{ route("addBook.validation") }} method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="ISBN">ISBN:</label>
            <input type="text" id="ISBN" name="ISBN" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="stock">Stock:</label>
            <input type="number" id="stock" name="stock" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" class="form-control" step="0.01" required>
        </div>

        <button type="submit" name="addBook" class="btn btn-primary mt-3">Add Book</button>
    </form>
</div>
@endsection
