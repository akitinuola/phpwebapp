{{-- this extend is to carry the body of the dashboard,allow me to utilize template in base --}}
@extends('portal.base') 
<link href="{{url("scss/general.scss")}}" rel="stylesheet">

@section('body')


    <h1>Add Squad</h1>
    <p>Fill the form below to add a new squad</p>
    <form action="{{ url('add-squad') }}" method="post">
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
        <input class="text email" type="text" name="status" placeholder="status"
        value="{{ old('status') }}" required>
{{-- this bracket is to allow you to input php variables inside html --}}
{{-- the foreach is a loop that alows yo to loop through an array, for instance the different coaches --}}
        <select name="coachId" value="{{ old('coachId') }}" required>
            <option>Select a coach</option>
            @foreach ($coaches as $coach)
                <option value="{{$coach->id}}">{{$coach->firstName}} {{$coach->lastName}}</option>
            @endforeach
        </select>
        <input type="submit" value="Add">
         
        {{-- <input type="text"> --}}
@stop
