@extends("layout.base")

@section("content")
<h1>Log In!</h1>

@include("message.error")
@include("message.success")

<form action="{{route("login.validation")}}" method="POST">
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
<h3>For development:</h3>
<p>User:admin@test.com</p>
<p>password:admin</p>
@endsection
