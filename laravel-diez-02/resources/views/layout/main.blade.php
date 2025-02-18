@extends("layout.layout")

@section("content")
<header style="margin-bottom: 2%;">
<h1 style="text-align: center;" >Welcome {{$loggedIn?session('customer_name'):"User"}}!</h1>
<h3 style="text-align: center;" >To the digital Bookshop</h3>
</header>

@include("message.success")
@include("message.error")
@include("layout.menu")
@include("user.userBooks")
@include("books")
@include("user.purchases")
@include("control")



@endsection
{{-- kk
wee


<!-- @include("books") -->
--}}
