
<div style="display: flex; justify-content: space-evenly;">
<a href="{{ route('dashboard') }}" style="padding: 10px 20px; background-color:{{$menu==1?'lightsalmon':'gray'}}; color: white; text-decoration: none; border-radius: 5px;">Check the Library</a>

<a href="{{ $loggedIn?route('userBooks'):route('login') }}" style="padding: 10px 20px; background-color:{{$loggedIn?($menu==2?'lightsalmon':'gray'):'lightgray'}} ; color: white; text-decoration: none; border-radius: 5px;">Rented Books</a>
<a href="{{ $loggedIn?route('purchases'):route('login') }}" style="padding: 10px 20px; background-color: {{$loggedIn?($menu==3?'lightsalmon':'gray'):'lightgray'}}; color: white; text-decoration: none; border-radius: 5px;">My Books</a>
<a href="{{ $loggedIn?route('dashboard'):route('login') }}" style="padding: 10px 20px; background-color: {{$loggedIn?($menu==4?'lightsalmon':'gray'):'lightgray'}}; color: white; text-decoration: none; border-radius: 5px;">Settings</a>



@if ($loggedIn && session('customer_type')==="premium")

<a href="{{route('control') }}" style="padding: 10px 20px; background-color: {{$loggedIn?($menu==4?'lightsalmon':'gray'):'lightgray'}}; color: white; text-decoration: none; border-radius: 5px;">Add Books</a>

@endif

</div>
