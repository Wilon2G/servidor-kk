@extends("layout")

@section("titulo")
    {{$titulo}}
@endsection

@section("encabezado")
    <h1>{{$encabezado}}</h1>
@endsection

@section("contenido")
<h3>Log In!</h3>
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