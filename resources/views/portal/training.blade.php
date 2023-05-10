{{-- this extend is to carry the body of the dashboard,allow me to utilize template in base --}}
@extends('portal.base') 
<link href="{{url("scss/general.scss")}}" rel="stylesheet">

@section('body')


    <h1>Training</h1>
    
    <p>this is the training page</p>
    @if (session('role') == 'admin' || session('role') == 'coach') 
    <a href="/new-training">Add new training</a>
    @endif
    

    <br>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>interval</th>
                <th>time</th>
                <th>day</th>
                <th>squad</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trainings as $getTraining)
                <tr>
                    <td>{{$getTraining->name}}</td>
                    <td>{{$getTraining->description}}</td>
                    <td>{{$getTraining->interval}}</td>
                    <td>{{$getTraining->time }} </td>
                    <td>{{$getTraining->day }} </td>
                    <td>{{$getTraining->squadDetails->name }} </td>
                    @if (session('role') == 'admin' || session('role') == 'coach') 
                    <td><a href="/edit-training/{{$getTraining->id}}">Edit</a></td>
                    <td><a href="/delete-training/{{$getTraining->id}}" style="color:red">Delete</a></td>
                @endif
                    
                </tr>
            @endforeach
            
        </tbody>
    </table>
@stop