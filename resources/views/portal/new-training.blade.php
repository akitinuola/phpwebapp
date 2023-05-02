{{-- this extend is to carry the body of the dashboard,allow me to utilize template in base --}}
@extends('portal.base') 
<link href="{{url("scss/general.scss")}}" rel="stylesheet">

@section('body')

<a href="/training">Go Back</a>
    <h1>Add Training</h1>
    <p>Fill the form below to add a new training</p>
    <form action="{{ url('add-training') }}" method="post">
        @csrf
        @if (count($errors))
            @foreach ($errors->all() as $error)
                <div style="color: black;"> {{ $error }}</div>
            @endforeach
        @endif

        <input class="text" type="text" name="name" placeholder="name"
            value="{{ old('name') }}" required>
        <input class="text email" type="text" name="description" placeholder="description"
        value="{{ old('description') }}" required>
    
        <input class="text email" type="time" name="time" placeholder="time"
        value="{{ old('time') }}" required>
        
        <select name="day" value="{{ old('day') }}">
            <option>Select a day of the week</option>
            <option>Sunday</option>
            <option>Monday</option>
            <option>Tuesday</option>
            <option>Wednesday</option>
            <option>Thursday</option>
            <option>Friday</option>
            <option>Saturday</option>
        </select>

        <select name="interval" value="{{ old('interval') }}">
            <option>Select an interval</option>
            <option>Daily</option>
            <option>Weekly</option>
            <option>Bi-weekly</option>
        </select>

        <select name="squadId" value="{{ old('squadId') }}">
            <option>Select a squad</option>
            
            @foreach ($squads as $squad)
                <option value="{{$squad->id}}">{{$squad->name}}</option>
            @endforeach
        </select>
{{-- this bracket is to allow you to input php variables inside html --}}
{{-- the foreach is a loop that alows yo to loop through an array, for instance the different coaches --}}
        <input type="submit" value="Add">
         
        {{-- <input type="text"> --}}
@stop
