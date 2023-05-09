{{-- this extend is to carry the body of the dashboard,allow me to utilize template in base --}}
@extends('portal.base') 
<link href="{{url("scss/general.scss")}}" rel="stylesheet">

@section('body')

<a href="/gala">Go Back</a>
    <h1>Add Gala</h1>
    <p>Fill the form below to add a new gala</p>
    <form action="{{ url('add-gala') }}" method="post">
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

        <input class="text email" type="date" name="date" placeholder="date"
        value="{{ old('date') }}" required>
    
        <input class="text email" type="time" name="time" placeholder="time"
        value="{{ old('time') }}" required>

        <input class="text email" type="text" name="location" placeholder="location"
        value="{{ old('location') }}" required>

       

        
        
        
      

{{-- this bracket is to allow you to input php variables inside html --}}
{{-- the foreach is a loop that alows yo to loop through an array, for instance the different coaches --}}
        <input type="submit" value="Add">
         
        {{-- <input type="text"> --}}
@stop
