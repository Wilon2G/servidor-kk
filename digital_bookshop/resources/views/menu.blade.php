<div style="display: flex; justify-content: space-evenly;">
<a href="{{ route('index') }}" style="padding: 10px 20px; background-color:lightsalmon; color: white; text-decoration: none; border-radius: 5px;">Check the Library</a>

<a href="{{ $customer?route('rentedBooks'):route('login') }}" style="padding: 10px 20px; background-color:{{$customer?('lightsalmon'):'lightgray'}} ; color: white; text-decoration: none; border-radius: 5px;">Rented Books</a>
<a href="{{ $customer?route('myBooks'):route('login') }}" style="padding: 10px 20px; background-color: {{$customer?('lightsalmon'):'lightgray'}}; color: white; text-decoration: none; border-radius: 5px;">My Books</a>
<a href="{{ $customer?route('index'):route('login') }}" style="padding: 10px 20px; background-color: {{$customer?('lightsalmon'):'lightgray'}}; color: white; text-decoration: none; border-radius: 5px;">Settings</a>



@if ($customer && $customer["type"]==="admin")

<a href="{{route('addBook') }}" style="padding: 10px 20px; background-color: {{$customer?('lightsalmon'):'lightgray'}}; color: white; text-decoration: none; border-radius: 5px;">Add Books</a>

@endif

</div>
