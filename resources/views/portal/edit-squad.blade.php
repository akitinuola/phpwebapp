{{-- this extend is to carry the body of the dashboard,allow me to utilize template in base --}}
@extends('portal.base') 


@section('body')


    <h1>Edit squad</h1>
    <p>Fill the form below to edit squad</p>
    <form action="{{ url('update-squad', [$squadDetails->id]) }}" method="post">
        @csrf
        @if (count($errors))
            @foreach ($errors->all() as $error)
                <div style="color: black;"> {{ $error }}</div>
            @endforeach
        @endif
       {{-- old function means when signing up and a mistake is made, it wont refresh and lose previous data inserted --}}
        <input class="text" type="text" name="name" placeholder="name"
            value="{{ $squadDetails->name }}" required>
        <input class="text email" type="text" name="description" placeholder="description"
        value="{{ $squadDetails->description }}" required>
        <input class="text email" type="text" name="status" placeholder="status"
        value="{{ $squadDetails->status }}" required>
{{-- this bracket is to allow you to input php variables inside html --}}
{{-- the foreach is a loop that alows yo to loop through an array, for instance the different coaches --}}
        {{-- <select name="coachId" value="{{ $squadDetails->coachId }}" required>
            <option>Select a coach</option>
            @foreach ($coaches as $coach)
                <option value="{{$coach->id}}">{{$coach->firstName}} {{$coach->lastName}}</option>
            @endforeach
        </select> --}}
        <input type="submit" value="Edit">
         
        {{-- <input type="text"> --}}
@stop
