{{-- this extend is to carry the body of the dashboard,allow me to utilize template in base --}}
@extends('portal.base') 
<link href="{{url("scss/general.scss")}}" rel="stylesheet">

@section('body')


    <h1>Squads</h1>
    <p>this is the squads page</p>
    @if (session('role') == 'admin' || session('role') == 'coach') 
        <a href="/new-squad">Add new squad</a>
    @endif
    
    <br>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Coach</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($squads as $squad)
                <tr>
                    <td>{{$squad->name}}</td>
                    <td>{{$squad->description}}</td>
                    <td>{{$squad->status}}</td>
                    <td>{{$squad->coachDetails->firstName}} {{$squad->coachDetails->lastName}}</td>
                    @if (session('role') == 'admin' || session('role') == 'coach') 
                        <td><a href="/edit-squad/{{$squad->id}}">Edit</a></td>
                        <td><a href="/delete-squad/{{$squad->id}}" style="color:red">Delete</a></td>
                    @endif
                    
                </tr>
            @endforeach
            
        </tbody>
    </table>
    <div class="list">
        <div class="item">

        </div>
    </div>
@stop