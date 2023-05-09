{{-- this extend is to carry the body of the dashboard,allow me to utilize template in base --}}
@extends('portal.base') 
<link href="{{ url('scss/general.scss') }}" rel="stylesheet">

@section('body')

    <a href="/edit-gala/{{$GalaPerformance->GalaId}}">Go Back</a>
    <h1>Edit Performance</h1>
    <form action="{{ url('update-gala-performance', [$GalaPerformance->id]) }}" method="post">
        @csrf
        @if (count($errors))
            @foreach ($errors->all() as $error)
                <div style="color: black;"> {{ $error }}</div>
            @endforeach
        @endif
    
        
         
        {{-- <input type="text"> --}}

        <input class="text email" type="text" name="time" placeholder="time" value="{{ $GalaPerformance->time}}" required>

        <input class="text email" type="text" name="point" placeholder="point" value="{{ $GalaPerformance->point}}" required>

        <input class="text email" type="text" name="position" placeholder="position" value="{{ $GalaPerformance->position }}" required> 


        
        

        

        <select name="stroke" value="{{ $GalaPerformance->position }}" required>
            <option  @selected($GalaPerformance->stroke == 'Backstrokes')>
                Backstrokes
            </option>
            <option   @selected($GalaPerformance->stroke == 'Butterfly')>
                Butterfly
            </option>
            <option   @selected($GalaPerformance->stroke == 'Freestyle')>
                Freestyle
            </option>
            <option   @selected($GalaPerformance->stroke == 'Breaststroke')>
                Breaststroke
            </option>
            <option   @selected($GalaPerformance->stroke == 'Sidestroke')>
                Sidestroke
            </option>
        </select>

        <input type="submit" value="Edit">
    </form>
@stop
