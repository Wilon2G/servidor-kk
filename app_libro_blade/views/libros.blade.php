@extends("layout")

@section("titulo")
    {{$titulo}}
@endsection

@section("encabezado")
    <h1>Todos Los Libros</h1>
@endsection

@section("contenido")
<div>
    <p>
        {{$contenido}}
    </p>
</div>

@endsection