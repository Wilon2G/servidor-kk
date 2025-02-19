@extends('layout.base')

@section('content')

<header style="margin-bottom: 2%;">
    <h1 style="text-align: center;" >Welcome User!</h1>
    <h3 style="text-align: center;" >To the digital Bookshop</h3>
    </header>

@include('menu')


@yield("main")

@endsection
