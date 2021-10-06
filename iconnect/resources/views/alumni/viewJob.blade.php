
@extends('layouts.alumninav')

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="{{ asset('css/alumni.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho+B1:wght@500&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">

@if(Session::has('success'))           
        <div class="alert alert-success" role="alert">
            {{ Session::get('success')}}
        </div>       
@endif 

@section('content')

<div class="body">

        <h2>
            <form action="{{ route('alumni.searchJob') }}" method="post"  id="search">
                @csrf
                <input type="text" name="searchJob" id="searchJob">
                <button class="btn btn-info" type="submit" id="button">Search</button>
            </form>
        </h2>

     
    @foreach($job as $jobs)
    <div class="box" style="display:block;">
    <div class="col-md-4">
    <div class="card" id="card">
       
        <div id="none">{{$jobs->id}}</div>
        <div class="title">{{$jobs->jobName}}</div>
        <div><img src="{{ asset('img/') }}/{{$jobs->image}}" alt="" width="150" height="150px"></div>
        <div><em>Emloyee: <em>{{$jobs->employeeType}}</div>
        <div><em>Type of Job: <em>{{$jobs->typeOfJob}}</div>
        <div><em>Position: <em>{{$jobs->position}}</div>
        <div><em>Salary: RM <em>{{$jobs->salary}}</div>
        <div><em>Requirements: <em>{{$jobs->qualification}}</div>
        <div><em>Address: <em>{{$jobs->location}}</div>
        <div><em>Working Hour: <em>{{$jobs->workingHour}}</div>
        <div><em>Description: <em>{{$jobs->description}}</div>
        <div id="none">{{$jobs->publisherId}}</div>

        <div class="applybtn">
        <button id="applyBtn"class="btn btn-warning"><a href="{{route('alumni.applyJob', ['id' => $jobs->id])}}" >Apply</a></button>
        </div>
    </div>
    </div>
    </div>
    @endforeach
            <div class="pagination" style="display:block;">
                {!! $job->links() !!}
            </div>


    </div>
   




@endsection