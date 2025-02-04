@extends("layout.layout")

@section('content')
<div>
    <h2>Congratulations!</h2>
    <p>You have found the secret route to the secret frog:</p>
    <img src="{{$frog}}">
    <p>Enjoy.</p>
</div>
@endsection
