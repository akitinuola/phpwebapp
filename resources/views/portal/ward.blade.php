{{-- this extend is to carry the body of the dashboard,allow me to utilize template in base --}}
@extends('portal.base') 
<link href="{{url("scss/general.scss")}}" rel="stylesheet">

@section('body')


    <h1>Ward</h1>
    <p>this is the Ward page</p>
    <a href="/new-ward">Add Ward </a>
    <br>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone-number</th>
                <th>Date of Birth</th>
                <th>Address</th>
                <th>Gender</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($wards as $getWard)
                <tr>
                    <td>{{$getWard->wardDetails->firstName.' '.$getWard->wardDetails->lastName}}</td>
                    <td>{{$getWard->wardDetails->email}}</td>
                    <td>{{$getWard->wardDetails->phonenumber}}</td>
                    <td>{{$getWard->wardDetails->dob}} </td>
                    <td>{{$getWard->wardDetails->address}} </td>
                    <td>{{$getWard->wardDetails->gender}} </td>
                  
                    <td><a href="/edit-ward/{{$getWard->wardDetails->id}}">Edit</a></td>
                </tr>
            @endforeach
            
        </tbody>
    </table>
@stop