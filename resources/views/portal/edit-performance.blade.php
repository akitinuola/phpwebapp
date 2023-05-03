{{-- this extend is to carry the body of the dashboard,allow me to utilize template in base --}}
@extends('portal.base')
<link href="{{ url('scss/general.scss') }}" rel="stylesheet">

@section('body')

    <a href="/training-performance">Go Back</a>
    <h1>Edit Training Performance</h1>
    <p>Fill the form below to edit Training Performance</p>
    <form action="{{ url('update-performance', [$gettrainingperformance->id]) }}" method="post">
        @csrf
        @if (count($errors))
            @foreach ($errors->all() as $error)
                <div style="color: black;"> {{ $error }}</div>
            @endforeach
        @endif

        <input class="text" type="date" name="trainingDate" placeholder="time" value="{{ $gettrainingperformance->trainingDate }}"
            required>

        <input class="text email" type="text" name="time" placeholder="time" value="{{ $gettrainingperformance->time }}" required>

        <input class="text email" type="text" name="rank" placeholder="rank" value="{{ $gettrainingperformance->rank }}" required>

        <select name="stroke" value="{{$gettrainingperformance->stroke }}" required>
            <option  @selected($gettrainingperformance->stroke == 'Backstrokes')>
                Backstrokes
            </option>
            <option   @selected($gettrainingperformance->stroke == 'Butterfly')>
                Butterfly
            </option>
            <option   @selected($gettrainingperformance->stroke == 'Freestyle')>
                Freestyle
            </option>
            <option   @selected($gettrainingperformance->stroke == 'Breaststroke')>
                Breaststroke
            </option>
            <option   @selected($gettrainingperformance->stroke == 'Sidestroke')>
                Sidestroke
            </option>
        </select>

        <select name="swimmerId" value="{{ $gettrainingperformance->swimmerId}}" required>
            <option>Select a swimmer</option>
            @foreach ($swimmers as $swimmer)
                <option  @selected($gettrainingperformance->swimmerId == $swimmer->id) value="{{$swimmer->id}}">{{$swimmer->firstName}} {{$swimmer->lastName}}</option>
            @endforeach
        </select>

        
        <select name="trainingId" value="{{ $gettrainingperformance->trainingId }}" required>
            <option>Select a training</option>
            @foreach ($trainings as $training)
                <option @selected($gettrainingperformance->trainingId == $training->id) value="{{$training->id}}">{{$training->name}}</option>
            @endforeach
        </select>


            {{-- this bracket is to allow you to input php variables inside html --}}
            {{-- the foreach is a loop that alows yo to loop through an array, for instance the different coaches --}}
            <input type="submit" value="Edit">

            {{-- <input type="text"> --}}
        @stop
