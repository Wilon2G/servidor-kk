@extends("layout.layout")

@section("content")
@include("message.error")
@include("message.success")

<h1>Log In!</h1>
<form action={{route("login.validate")}} method="POST">
    @csrf
    <label>
        Email:
        <input type="text" name="email" required>
    </label>
    <br>
    <label>
        Password:
        <input type="password" name="password" required>
    </label>
    <br>
    <input type="submit" name="logIn" value="LogIn" >
</form>

{{-- <p>Nota para el desarrollador (y para Sonia ;)</p>
<p>Solo los usuarios premium pueden crear libros</p>
<p>Solo los usuarios premium pueden crear libros</p>
<p>admin@test.com  pass: 123456</p> --}}



@endsection
