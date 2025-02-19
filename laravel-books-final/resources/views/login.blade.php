@extends("layout.base")

@section("content")
<h1>Log In!</h1>
<form action="#" method="POST">
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
@endsection
