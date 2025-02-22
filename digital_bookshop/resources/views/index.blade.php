@extends('layout.base')

@section('content')

<header style="margin-bottom: 2%;">
    <h1 style="text-align: center;" >Welcome {{$customer?$customer["firstname"]:"User"}}</h1>
    <h3 style="text-align: center;" >To the Digital Bookshop</h3>
    </header>


@include("message.success")
@include("message.error")


@include('menu')


@yield("main")

@endsection
