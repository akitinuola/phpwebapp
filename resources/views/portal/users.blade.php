{{-- this extend is to carry the body of the dashboard,allow me to utilize template in base --}}
@extends('portal.base') 
<link href="{{url("scss/general.scss")}}" rel="stylesheet">

@section('body')


    <h1>Users</h1>
    <p>this is the user's page</p>
   
    <br>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone-number</th>
                <th>Role</th>
                <th>Address</th>
                <th>Gender</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $userId)
                <tr>
                    <td>{{$userId->firstName.''.$userId->lastName}}</td>
                    <td>{{$userId->email}}</td>
                    <td>{{$userId->phonenumber}}</td>
                    <td>{{$userId->role}} </td>
                    <td>{{$userId->address}} </td>
                    <td>{{$userId->gender}} </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>
@stop