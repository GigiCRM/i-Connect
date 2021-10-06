@extends('layouts.studentnav')

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="{{ asset('css/studentHome.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho+B1:wght@500&display=swap" rel="stylesheet">

@section('content')
<!-- Sidebar -->
<div class="sidebar">
@foreach($internStatus as $internStatus)
    <div class="w3-sidebar w3-dark-grey w3-bar-block" style="width:25%">
    <img src="{{ asset('img/') }}/{{$internStatus->studentImage}}"  alt="">
    <div class="side-content">
        <a href="{{ route('showStudentProfile') }}" class="w3-bar-item w3-button w3-padding-16">Profile</a>
        <a href="{{ route('showStudentResume') }}" class="w3-bar-item w3-button w3-padding-16">Resume</a>
        <a href="{{ route('insert.internStatus') }}" class="w3-bar-item w3-button w3-padding-16">Intern Status Selection</a>
        <a href="{{ route('showInternDetail') }}" class="w3-bar-item w3-button w3-padding-16">Intern Status</a>
        <a href="{{ route('student.showEnrolSubject') }}" class="w3-bar-item w3-button w3-padding-16">Classroom</a>
    </div>
    
    </div>
</div>


<!-- Page Content -->
<div class="profile-content" style="margin-left:25%">

<div class="page-content" style="margin:auto; border: 1px solid black; width:70%;">
    <div class="w3-container w3-light-grey" style="height: 100%;">
   <div style="font-size:25px; font-weight:bold; font-family: 'Libre Baskerville', serif; text-decoration:underline;">Intern Status</div>
   <div id="space"> 
    <div><em> Student Intern Status:</em> {{$internStatus->internStatus}} </div>

    
        <div style="display:none;"><em> Job id:</em> {{$internStatus->jobId}}</div>
        <div><em> Job Name:</em> {{$internStatus->jobName}}</div>
        <div style="display:none;"><em> Publisher Id:</em> {{$internStatus->publisherId}}</div>
        <div><em> Publisher Name:</em> {{$internStatus->publisherName}}</div>
        <div><em> Company Name:</em> {{$internStatus->jobCompanyName}}</div>
        <div><em> Position:</em> {{$internStatus->jobPosition}}</div>
        <div><em> Salary:</em> {{$internStatus->jobSalary}}</div>
        <div><em> Job Location:</em> {{$internStatus->jobLocation}}</div>
        <div><em> Working Hour:</em> {{$internStatus->jobWorkingHour}}</div>
        <div><em> Type of job:</em> {{$internStatus->jobTypeOfJob}}</div>
        <div><em> Job Image:</em> {{$internStatus->jobImage}}</div>


    </div>

    </div>
</div>
@endforeach
@endsection