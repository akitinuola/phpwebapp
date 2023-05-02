{{-- this extend is to carry the body of the dashboard,allow me to utilize template in base --}}
@extends('portal.base')
<link href="{{ url('scss/general.scss') }}" rel="stylesheet">

@section('body')

    <a href="/training">Go Back</a>
    <h1>{{ $trainingDetails->name }} squad</h1>
    <p>Fill the form below to edit training</p>
    <form action="{{ url('update-training', [$trainingDetails->id]) }}" method="post">
        @csrf
        @if (count($errors))
            @foreach ($errors->all() as $error)
                <div style="color: black;"> {{ $error }}</div>
            @endforeach
        @endif
        {{-- old function means when signing up and a mistake is made, it wont refresh and lose previous data inserted --}}
        <input class="text" type="text" name="name" placeholder="name" value="{{ $trainingDetails->name }}" required>
        <input class="text email" type="text" name="description" placeholder="description"
            value="{{ $trainingDetails->description }}" required>

        <input class="text email" type="time" name="time" placeholder="time" value="{{ $trainingDetails->time }}" required>

        <select name="day" value="{{ $trainingDetails->day }}">
            <option>Select a day of the week</option>
            <option @selected($trainingDetails->day == 'Sunday')>Sunday</option>
            <option @selected($trainingDetails->day == 'Monday')>Monday</option>
            <option @selected($trainingDetails->day == 'Tuesday')>Tuesday</option>
            <option @selected($trainingDetails->day == 'Wednesday')>Wednesday</option>
            <option @selected($trainingDetails->day == 'Thursday')>Thursday</option>
            <option @selected($trainingDetails->day == 'Friday')>Friday</option>
            <option @selected($trainingDetails->day == 'Saturday')>Saturday</option>
        </select>

        <select name="interval" value="{{ $trainingDetails->interval }}">
            <option>Select an interval</option>
            <option @selected($trainingDetails->interval == 'Daily')>Daily</option>
            <option @selected($trainingDetails->interval == 'Weekly')>Weekly</option>
            <option @selected($trainingDetails->interval == 'Bi-weekly')>Bi-weekly</option>
        </select>

        <select name="squadId" value="{{ $trainingDetails->squadId }}">
            <option>Select a squad</option>

            @foreach ($squads as $squad)
                <option value="{{ $squad->id }}" @selected($squad->id == $trainingDetails->squadId)>{{ $squad->name }}</option>
            @endforeach
        </select>

        <input type="submit" value="Edit">
    @stop
