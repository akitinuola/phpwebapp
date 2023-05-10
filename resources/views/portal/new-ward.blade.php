{{-- this extend is to carry the body of the dashboard,allow me to utilize template in base --}}
@extends('portal.base') 
<link href="{{url("scss/general.scss")}}" rel="stylesheet">

@section('body')


    <h1>Add Ward</h1>
    <p>Fill the form below to add a new ward</p>
    <form action="{{ url('add-ward') }}" method="post">
        @csrf
        @if (count($errors))
            @foreach ($errors->all() as $error)
                <div style="color: black;"> {{ $error }}</div>
            @endforeach
        @endif
       
        <input class="text" type="text" name="username" placeholder="Username"
        value="{{ old('username') }}" required>
    <input class="text email" type="email" name="email" placeholder="Email"
        value="{{ old('email') }}" required>
    <input class="text email" type="password" name="password" placeholder="Password"
        value="{{ old('password') }}" required>
    <input class="text email" type="password" name="password_confirmation"
        placeholder="Confirm Password" required>
    <input class="text" type="text" name="firstName" placeholder="Firstname"
        value="{{ old('firstName') }}" required>
    <input class="text email" type="text" name="lastName" placeholder="Lastname"
        value="{{ old('lastName') }}" required>
    <input class="text email" type="text" name="address" placeholder="Address"
        value="{{ old('address') }}" required>
    <input class="text email" type="date" name="dob" placeholder="dob"
        value="{{ old('dob') }}" required>
    <input class="text email" type="text" name="postcode" placeholder="Postcode"
        value="{{ old('postcode') }}" required>
    {{-- <input type="text"> --}}

    <input class="text email" type="text" name="phonenumber" placeholder="Phone Number"
        value="{{ old('phonenumber') }}" required>
    {{-- <input class="text w3lpass" type="password" name="password" placeholder="Confirm Password"
            required=""> --}}
    {{-- <label  for="gender">gender</label> --}}
    <select name="gender">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select>
        <input type="submit" value="Add">
         
        {{-- <input type="text"> --}}
@stop
