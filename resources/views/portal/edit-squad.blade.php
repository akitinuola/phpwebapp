{{-- this extend is to carry the body of the dashboard,allow me to utilize template in base --}}
@extends('portal.base') 
<link href="{{url("scss/general.scss")}}" rel="stylesheet">

@section('body')

    <a href="/squads">Go Back</a>
    <h1>{{ $squadDetails->name }} squad</h1>
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
        <input type="submit" value="Edit">
    </form>
    <br>
    <a href="{{$squadDetails->id}}/new-squad-member">Add new squad member</a>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($getMembers as $member)
                <tr>
                    <td>{{$member->firstName}} {{$member->lastName}}</td>
                    <td>{{$member->dob}}</td>
                    <td>{{$member->gender}}</td>
                    <td><a href="/delete-squad-member/{{$member->id}}" style="color:red">Delete</a></td>
                </tr>
            @endforeach
            
        </tbody>
    </table>
@stop
