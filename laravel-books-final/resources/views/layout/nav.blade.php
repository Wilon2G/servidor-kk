

<nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark ticky-top bg-body-tertiary"
        data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand fw-light" href="{{ route("index") }}"><span class="fas fa-brain me-1"> </span>Digital Bookshop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route("login") }}">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("register") }}">Register</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Log Out</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

