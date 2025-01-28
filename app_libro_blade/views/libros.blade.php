@extends("layout")

@section("titulo")
    {{$titulo}}
@endsection

@section("encabezado")
    <h1>{{$encabezado}}</h1>
@endsection

@section("contenido")
<div>
    <ul>
        @foreach ($libros as $libro)
            <li>{{$libro['title']}}</li>
        @endforeach
    </ul>
</div>
@endsection