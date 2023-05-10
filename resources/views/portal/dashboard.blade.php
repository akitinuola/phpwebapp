{{-- this extend is to carry the body of the dashboard,allow me to utilize template in base --}}
@extends('portal.base')
<link href="{{ url('scss/general.scss') }}" rel="stylesheet">

@section('body')
    <h1>Dashboard</h1>
    <p>this is the dashboard page</p>
    <div class="top">
        <div class="summary-item">
            <h2> Total Swimmers</h2>
            <p>{{$totalSwimmers}}</p>
        </div>
        {{-- to link the number of codes with controller to show the number of coaches and swimmer --}}
        <div class="summary-item">
            <h2> Total Coaches</h2>
            <p>{{$totalCoaches}}</p>
        </div>
        <div class="summary-item">
            <h2> Total Squads</h2>
            <p>{{$totalSquad}}</p>
        </div>
        <div class="summary-item">
            <h2> Total Galas</h2>
            <p>{{$totalGala}}</p>
        </div>
    </div>
    <br>
    <h2>Upcoming Events </h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Location</th>
                <th>Date</th>
                <th>Time</th>
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
                </tr>
            @endforeach
            
        </tbody>
    </table>
@stop
