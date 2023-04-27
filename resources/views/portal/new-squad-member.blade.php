{{-- this extend is to carry the body of the dashboard,allow me to utilize template in base --}}
@extends('portal.base') 


@section('body')

    <a href="/edit-squad/{{$squadId}}">Go Back</a>
    <h1>Add Member</h1>
    <p>Fill the form below to add a new member</p>
    <p>{{$squadId}}</p>
    <form action="{{ url('add-squad-member', [$squadId]) }}" method="post">
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
                <option value="{{$swimmer->id}}">{{$swimmer->firstName}} {{$swimmer->lastName}}</option>
            @endforeach
        </select>
        <input type="submit" value="Add">
         
        {{-- <input type="text"> --}}
@stop
