{{-- this extend is to carry the body of the dashboard,allow me to utilize template in base --}}
@extends('portal.base') 
<link href="{{url("scss/general.scss")}}" rel="stylesheet">

@section('body')


    <h1>Gala</h1>
    <p>this is the Gala page</p>
    <a href="/new-gala">Add new Gala page</a>
    <br>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Location</th>
                <th>Date</th>
                <th>Time</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Galas as $getGala)
                <tr>
                    <td>{{$getGala->name}}</td>
                    <td>{{$getGala->description}}</td>
                    <td>{{$getGala->location }} </td>
                    <td>{{$getGala->date }} </td>
                    <td>{{$getGala->time }} </td>
                   
                  
                    <td><a href="/edit-gala/{{$getGala->id}}">Edit</a></td>
                    <td><a href="/delete-gala/{{$getGala->id}}" style="color:red">Delete</a></td>
                </tr>
            @endforeach
            
        </tbody>
    </table>
@stop