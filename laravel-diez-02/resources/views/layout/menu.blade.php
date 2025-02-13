
<div style="display: flex; justify-content: space-evenly;">
<a href="{{ route('dashboard') }}" style="padding: 10px 20px; background-color: gray; color: white; text-decoration: none; border-radius: 5px;">Check the Library</a>

<a href="{{ $loggedIn?route('userBooks'):route('login') }}" style="padding: 10px 20px; background-color:{{$loggedIn?'gray':'lightgray'}} ; color: white; text-decoration: none; border-radius: 5px;">Rented Books</a>
<a href="{{ $loggedIn?route('purchases'):route('login') }}" style="padding: 10px 20px; background-color: {{$loggedIn?'gray':'lightgray'}}; color: white; text-decoration: none; border-radius: 5px;">My Books</a>
<a href="{{ $loggedIn?route('dashboard'):route('login') }}" style="padding: 10px 20px; background-color: {{$loggedIn?'gray':'lightgray'}}; color: white; text-decoration: none; border-radius: 5px;">Settings</a>

</div>