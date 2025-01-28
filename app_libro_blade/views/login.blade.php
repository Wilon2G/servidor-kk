@extends("layout")

@section("titulo")
    {{$titulo}}
@endsection

@section("encabezado")
    <h1>{{$encabezado}}</h1>
@endsection

@section("contenido")
<form action="#" method="POST">
    <label>
        Username:
        <input type="text" name="userName" required>
    </label>
    
    
</form>
@endsection