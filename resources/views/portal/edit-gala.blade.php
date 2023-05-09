{{-- this extend is to carry the body of the dashboard,allow me to utilize template in base --}}
@extends('portal.base')
<link href="{{ url('scss/general.scss') }}" rel="stylesheet">

@section('body')

    <a href="/gala">Go Back</a>
    <h1>{{ $GalaDetails->name }} </h1>
    <p>Fill the form below to edit Gala </p>
    <form action="{{ url('update-gala', [$GalaDetails->id]) }}" method="post">
        @csrf
        @if (count($errors))
            @foreach ($errors->all() as $error)
                <div style="color: black;"> {{ $error }}</div>
            @endforeach
        @endif

        <input class="text" type="text" name="name" placeholder="name" value="{{ $GalaDetails->name }}" required>

        <input class="text email" type="text" name="description" placeholder="description"
            value="{{ $GalaDetails->description }}" required>

        <input class="text email" type="date" name="date" placeholder="date" value="{{ $GalaDetails->date }}"
            required>

        <input class="text email" type="time" name="time" placeholder="time" value="{{ $GalaDetails->time }}"
            required>

        <input class="text email" type="text" name="location" placeholder="location" value="{{ $GalaDetails->location }}"
            required>


        {{-- this bracket is to allow you to input php variables inside html --}}
        {{-- the foreach is a loop that alows yo to loop through an array, for instance the different coaches --}}
        <input type="submit" value="Edit">
    </form>

    {{-- <input type="text"> --}}

    <a href="{{ $GalaDetails->id }}/new-gala-performance">Add new gala performance</a>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Time</th>
                <th>Point</th>
                <th>Stroke</th>
                <th>Position</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($getGalaPerformances as $getGala)
                <tr>
                    <td>{{ $getGala->name }}</td>
                    <td>{{ $getGala->age }}</td>
                    <td>{{ $getGala->gender }} </td>
                    <td>{{ $getGala->time }} </td>
                    <td>{{ $getGala->point }} </td>
                    <td>{{ $getGala->stroke }} </td>
                    <td>{{ $getGala->position }} </td>


                    <td><a href="/edit-gala-performance/{{ $getGala->id }}">Edit</a></td>
                    <td><a href="/delete-gala-performance/{{ $getGala->id }}" style="color:red">Delete</a></td>
                </tr>
            @endforeach

        </tbody>
    </table>
@stop
