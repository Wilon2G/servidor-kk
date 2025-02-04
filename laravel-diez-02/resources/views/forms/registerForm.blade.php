@extends("layout.layout")

@section("content")
<h1>Register now!</h1>
<p>To access all the benefits of the Digital Bookshop</p>
<form action="#" method="POST">
    <label>
        First Name:
        <input type="text" name="firstName" required>
    </label>
    <br>
    <label>
        Surname:
        <input type="text" name="surname" required>
    </label>
    <br>
    <label>
        Email:
        <input type="text" name="userName" required>
    </label>
    <br>
    <label>
        Password:
        <input type="text" name="password" required>
    </label>
    <br>

    <lable>
        Plan: 
        <input type="radio" name="type" value="basic" checked>Basic</input>
        
        <input type="radio" name="type" value="premium">Premium</input>
    </label>
    <br>
    <input type="submit" name="logIn" >
</form>
@endsection