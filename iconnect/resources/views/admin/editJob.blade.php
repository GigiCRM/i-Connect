@extends('layouts.adminNav')

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="{{ asset('css/studentHome.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho+B1:wght@500&display=swap" rel="stylesheet">

@section('content')


<!-- Page Content -->
<div class="profile-content">

<div class="page-content">
    <div class="w3-container w3-light-grey" style="height: 100%;">
   
    <form class="subform"  method="post" action="{{ route('updateJob') }}" enctype="multipart/form-data">
            @csrf  


    @foreach($jobs as $jobs)
    <p>
                        <label for="id" class=""> ID</label>
                        <input type="text" name="id" id="id" value="{{$jobs->id}}" readonly>
                    </p>
                    <p>
                        <label for="publisherId" class="">Publisher Id</label>
                        <input type="text" name="publisherId" id="publisherId" value="{{$jobs->publisherId}}" readonly>
                    </p>
                    <p>
                        <label for="jobName" class="">Job Name</label>
                        <input type="text" name="jobName" id="jobName" value="{{$jobs->jobName}}">
                    </p>
                    
                    <p>
                        <label for="position" class="">Position</label>
                        <input type="text" name="position" id="position" value="{{$jobs->position}}">
                    </p>
                    <p>
                        <label for="salary" class="">Salary</label>
                        <input type="text" name="salary" id="salary" value="{{$jobs->salary}}">
                    </p>

                    <p>
                        <label for="Qualification" class="">qualification</label>
                        <input type="text" name="qualification" id="qualification" value="{{$jobs->qualification}}">
                    </p>

                    <p>
                        <label for="location" class="">Location</label>
                        <input type="text" name="location" id="location" value="{{$jobs->location}}">
                    </p>


                    <p>
                        <label for="workingHour" class="">Working Hour</label>
                        <input type="text" name="workingHour" id="workingHour" value="{{$jobs->workingHour}}">
                    </p>

                    <p>
                    <div class="form-group input-group-lg">
                    <label for="typeOfJob" class="text-info">Full-time / Part-time: </label><br>
                    <input type="radio" id="typeOfJob" name="typeOfJob" value="Full-time">
                    <label for="Full-time">Full-time</label><br>
                <input type="radio" id="typeOfJob" name="typeOfJob" value="Part-time">
                    <label for="Part-time">Part-time</label><br>
                </div>

                    </p>

                    <p>
                        <label for="description" class="">Description</label><br>
                        <input type="text" name="description" id="description" value="{{$jobs->description}}">
                    </p>

                    <p>
                    <div class="form-group input-group-lg">
                    <label for="employeeType" class="text-info">Employee Type: </label><br>
                    <input type="radio" id="employeeType" name="employeeType" value="Intern">
                    <label for="Intern">Intern</label><br>
                <input type="radio" id="employeeType" name="employeeType" value="Normal">
                    <label for="Normal">Normal</label><br>
                </div>
                    </p>

                    <p>
                        <label for="salary" class="">Salary</label>
                        <input type="number" name="salary" id="salary" value="{{$jobs->salary}}">
                    </p>

                    <p>
                        <input type="file" class="form-control" name="job-image" value="">
                    </p>

    <div class="text-center">
                <input type="submit" name="insert"  id="button" class="" value="Comfirm" style="height: 50px; width: 30%;" >
    </div>
@endforeach
    </div>
</div>
@endsection