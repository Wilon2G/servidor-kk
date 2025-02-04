@extends("layout.layout")

@section("content")
<h1>Welcome {{$loggedIn?session('user')['username']:"User"}}!</h1>
<h3>To the digital Bookshop</h3>
<div style="display: flex;">
    

</div>

@endsection
