{{-- this extend is to carry the body of the dashboard,allow me to utilize template in base --}}
@extends('portal.base')
<link href="{{ url('scss/general.scss') }}" rel="stylesheet">

@section('body')

    <h1>Edit Profile</h1>
    <p>Fill the form below to edit your Profile</p>
    <form action="{{ url('update-settings', [$settings->id]) }}" method="post">
        @csrf
        @if (count($errors))
            @foreach ($errors->all() as $error)
                <div style="color: black;"> {{ $error }}</div>
            @endforeach
        @endif

        <input class="text" type="text" name="username" placeholder="username" value="{{ $settings->username}}"
        required>

        <input class="text" type="text" name="firstname" placeholder="firstname" value="{{ $settings->firstName}}"
            required>

        <input class="text email" type="text" name="lastname" placeholder="lastname" value="{{ $settings->lastName }}" required>

        <input class="text email" type="text" name="address" placeholder="address" value="{{ $settings->address}}" required>

        <input class="text" type="text" name="postcode" placeholder="postcode" value="{{ $settings->postcode}}"
        required>

        <input class="text" type="number" name="phonenumber" placeholder="phonenumber" value="{{ $settings->phonenumber}}"
        required>

        <input class="text" type="email" name="email" placeholder="email" value="{{ $settings->email}}"
        required>

       

        


            {{-- this bracket is to allow you to input php variables inside html --}}
            {{-- the foreach is a loop that alows yo to loop through an array, for instance the different coaches --}}
            <input type="submit" value="Edit">

            {{-- <input type="text"> --}}
        @stop
