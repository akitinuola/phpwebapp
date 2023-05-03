{{-- this extend is to carry the body of the dashboard,allow me to utilize template in base --}}
@extends('portal.base') 
<link href="{{url("scss/general.scss")}}" rel="stylesheet">

@section('body')


    <h1>Training Performance</h1>
    <p>this is the training performance page</p>
    <a href="/new-performance">Add new performance</a>
    <br>
    <table>
        <thead>
            <tr>
                <th>Swimmer Name</th>
                <th>Training</th>
                <th>Swimming time</th>
                <th>Stroke</th>
                <th>Rank</th>
                <th>Training Date</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        {{-- body of the page where all input made would be shown --}}
            @foreach ($trainingPerformances as $getTrainingPerformance)
                <tr>
{{-- the arrow key (-> signifies laravel to check inside the function gettraining performance for these informaton) --}}
                    <td>{{$getTrainingPerformance->swimmerDetails->firstName}}</td>
                    <td>{{$getTrainingPerformance->trainingDetails->name}}</td>
                    <td>{{$getTrainingPerformance->time}}</td>
                    <td>{{$getTrainingPerformance->stroke }} </td>
                    <td>{{$getTrainingPerformance->rank }} </td>
                    <td>{{$getTrainingPerformance->trainingDate }} </td>
                    <td><a href="/edit-performance/{{$getTrainingPerformance->id}}">Edit</a></td>
                    <td><a href="/deletePerformance/{{$getTrainingPerformance->id}}" style="color:red">Delete</a></td>
                </tr>
            @endforeach
            
        </tbody>
    </table>
@stop