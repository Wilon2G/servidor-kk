
<div style="display: flex; justify-content: space-evenly;">
<a href="{{ route('books') }}" style="padding: 10px 20px; background-color: gray; color: white; text-decoration: none; border-radius: 5px;">Check the Library</a>

<a href="{{ $user?route('books'):route('login') }}" style="padding: 10px 20px; background-color:{{$user?'gray':'lightgray'}} ; color: white; text-decoration: none; border-radius: 5px;">Your Books</a>
<a href="{{ $user?route('books'):route('login') }}" style="padding: 10px 20px; background-color: {{$user?'gray':'lightgray'}}; color: white; text-decoration: none; border-radius: 5px;">Rent Books</a>
<a href="{{ $user?route('books'):route('login') }}" style="padding: 10px 20px; background-color: {{$user?'gray':'lightgray'}}; color: white; text-decoration: none; border-radius: 5px;">Buy Books</a>
<a href="{{ $user?route('books'):route('login') }}" style="padding: 10px 20px; background-color: {{$user?'gray':'lightgray'}}; color: white; text-decoration: none; border-radius: 5px;">Settings</a>

</div>