@extends('layout.base')

@section('content')

<header style="margin-bottom: 2%;">
    <h1 style="text-align: center;" >Welcome User!</h1>
    <h3 style="text-align: center;" >To the digital Bookshop</h3>
    </header>

    
@include("message.success")
@include("message.error")


@if (session()->has('success'))

<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session("success")}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif

@include('menu')


@yield("main")

@endsection
