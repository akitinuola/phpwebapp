{{-- this extend is to carry the body of the dashboard,allow me to utilize template in base --}}
@extends('portal.base')
<link href="{{ url('scss/general.scss') }}" rel="stylesheet">

@section('body')

    <a href="/edit-gala/{{ $GalaId }}">Go Back</a>
    <h1>Add Performance</h1>
    <p>Fill the form below to add a new performance</p>
    <p>{{ $GalaId }}</p>
    <form action="{{ url('add-gala-performance', [$GalaId]) }}" method="post">
        @csrf
        @if (count($errors))
            @foreach ($errors->all() as $error)
                <div style="color: black;"> {{ $error }}</div>
            @endforeach
        @endif

        {{-- this bracket is to allow you to input php variables inside html --}}
        {{-- the foreach is a loop that alows yo to loop through an array, for instance the different coaches --}}
        <select name="swimmerId" value="{{ old('swimmerId') }}" required>
            <option>Select a swimmer</option>
            @foreach ($swimmers as $swimmer)
                <option value="{{ $swimmer->id }}">{{ $swimmer->firstName }} {{ $swimmer->lastName }}</option>
            @endforeach
        </select>


        {{-- <input type="text"> --}}

        <input class="text email" type="text" name="time" placeholder="time" value="{{ old('time') }}" required>

        <input class="text email" type="text" name="point" placeholder="point" value="{{ old('point') }}" required>

        <input class="text email" type="text" name="position" placeholder="position" value="{{ old('position') }}"
            required>



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

        <input type="submit" value="Add">
    </form>
@stop
