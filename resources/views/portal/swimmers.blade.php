{{-- this extend is to carry the body of the dashboard,allow me to utilize template in base --}}
@extends('portal.base') 
<link href="{{url("scss/general.scss")}}" rel="stylesheet">

@section('body')


    <h1>Swimmers</h1>
    <p>this is the swimmer's page</p>
   
    <br>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>Age</th>
                <th>No. of First-Place</th>
                <th>No. of Second-Place</th>
                <th>No. of Third-Place</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($swimmers as $swimmerId)
                <tr>
                    <td>{{$swimmerId->firstName.''.$swimmerId->lastName}}</td>
                    <td>{{$swimmerId->gender}} </td>
                    <td>{{$swimmerId->age}} </td>
                    <td>{{$swimmerId->numberOfFirstPlace}} </td>
                    <td>{{$swimmerId->numberOfSecondPlace}} </td>
                    <td>{{$swimmerId->numberOfThirdPlace}} </td>
                </tr>
            @endforeach
            
        </tbody>
    </table>
@stop