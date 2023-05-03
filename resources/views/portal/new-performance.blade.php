{{-- this extend is to carry the body of the dashboard,allow me to utilize template in base --}}
@extends('portal.base')
<link href="{{ url('scss/general.scss') }}" rel="stylesheet">

@section('body')

    <a href="/training-performance">Go Back</a>
    <h1>Add Training Performance</h1>
    <p>Fill the form below to add a new Training Performance</p>
    <form action="{{ url('add-training-performance') }}" method="post">
        @csrf
        @if (count($errors))
            @foreach ($errors->all() as $error)
                <div style="color: black;"> {{ $error }}</div>
            @endforeach
        @endif

        <input class="text" type="date" name="trainingDate" placeholder="time" value="{{ old('trainingDate') }}"
            required>

        <input class="text email" type="text" name="time" placeholder="time" value="{{ old('time') }}" required>

        <input class="text email" type="text" name="rank" placeholder="rank" value="{{ old('rank') }}" required>

        <select name="stroke" value="{{ old('stroke') }}" required>
            <option>
                Backstrokes
            </option>
            <option>
                Butterfly
            </option>
            <option>
                Freestyle
            </option>
            <option>
                Breaststroke
            </option>
            <option>
                Sidestroke
            </option>
        </select>

        <select name="swimmerId" value="{{ old('swimmerId') }}" required>
            <option>Select a swimmer</option>
            @foreach ($swimmers as $swimmer)
                <option value="{{$swimmer->id}}">{{$swimmer->firstName}} {{$swimmer->lastName}}</option>
            @endforeach
        </select>

        
        <select name="trainingId" value="{{ old('trainingId') }}" required>
            <option>Select a training</option>
            @foreach ($trainings as $training)
                <option value="{{$training->id}}">{{$training->name}}</option>
            @endforeach
        </select>


            {{-- this bracket is to allow you to input php variables inside html --}}
            {{-- the foreach is a loop that alows yo to loop through an array, for instance the different coaches --}}
            <input type="submit" value="Add">

            {{-- <input type="text"> --}}
        @stop
