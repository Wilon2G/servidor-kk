@extends("layout.layout")

@section("content")
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h1 class="text-center mb-3">Register Now!</h1>
                    <p class="text-center">To access all the benefits of the Digital Bookshop</p>

                    <form action="#" method="POST">
                        @csrf <!-- lo del la protección contra ataques, si no se pone no furula la cosa -->

                        <div class="mb-3">
                            <label class="form-label">First Name:</label>
                            <input type="text" name="firstName" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Surname:</label>
                            <input type="text" name="surname" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email:</label>
                            <input type="email" name="userName" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password:</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label d-block">Plan:</label>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="type" value="basic" id="basic" class="form-check-input" checked>
                                <label for="basic" class="form-check-label">Basic</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="type" value="premium" id="premium" class="form-check-input">
                                <label for="premium" class="form-check-label">Premium</label>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
