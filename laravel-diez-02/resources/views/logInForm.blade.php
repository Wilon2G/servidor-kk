@extends("layout.layout")

@section("content")
<h1>Log In!</h1>
<form action="#" method="POST">
    <label>
        Username:
        <input type="text" name="userName" required>
    </label>
    <br>
    <label>
        Password:
        <input type="text" name="password" required>
    </label>
    <br>
    <input type="submit" name="logIn" >
</form>
@endsection
